<?php
namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use App\User;
use App\Models\RegistrationAccessToken;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\ModelRepositoryInterfaces\UserModelRepositoryInterface;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\RegisterService;

class RegisterServiceTest extends TestCase
{
    use DatabaseMigrations;

    protected $userModelRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userModelRepo = Mockery::spy(UserModelRepositoryInterface::class);
        $this->service = new RegisterService($this->userModelRepo);
    }

    /**
     * @test
     * @group noFramework
     */
    public function registerStudentEmail_returns_a_user()
    {
        $input = [
            "email" => "teehee@gnomsayin.com"
        ];

        $mockUser = new User(['user_id' => '251']);

        $this->userModelRepo
            ->shouldReceive('findByEmail')
            ->with('teehee@gnomsayin.com')
            ->andReturn(null);

        $this->userModelRepo
            ->shouldReceive('registerStudentEmail')
            ->with($input)
            ->andReturn($mockUser);

        $this->userModelRepo
            ->shouldReceive('generateAccessCode')
            ->once();

        $this->assertEquals($mockUser, $this->service->registerStudentEmail($input));
    }

    /**
     * @test
     * @group noFramework
     */
    public function completeRegistration_returns_a_completed_user()
    {
        $input = [
            "first_name" => "teehee@gnomsayin.com",
            "last_name" => "teehee@gnomsayin.com",
            "email" => "teehee@gnomsayin.com",
            "password" => "teehee@gnomsayin.com",
            "password_confirmation" => "teehee@gnomsayin.com",
            "accessCode" => "123123"
        ];

        $mockUser = new User(['user_id' => '251', 'verified' => false]);

        $this->userModelRepo
            ->shouldReceive('findByEmail')
            ->with('teehee@gnomsayin.com')
            ->andReturn($mockUser);

        $this->userModelRepo
            ->shouldReceive('findAccessCode')
            ->with($mockUser, $input)
            ->andReturn("123123");

        $this->userModelRepo
            ->shouldReceive('completeRegistration')
            ->with($mockUser, $input)
            ->andReturn($mockUser);

        $this->assertEquals($mockUser, $this->service->completeRegistration($input));
    }
}

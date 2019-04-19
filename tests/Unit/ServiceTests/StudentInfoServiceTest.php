<?php

namespace tests\Unit\ServiceTests;

use App\Models\StudentInfo;
use App\Services\StudentInfoService;
use App\ModelRepositoryInterfaces\StudentInfoRepositoryInterface;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;
use Tests\TestCase;

class StudentInfoServiceTest extends TestCase
{
    use DatabaseMigrations;

    protected $studentInfoModelRepo;

    public function setUp(){
        parent::setUp();
        $this->studentInfoModelRepo = Mockery::spy(StudentInfoRepositoryInterface::class);
        $this->service = new StudentInfoService($this->studentInfoModelRepo);
    }

    /**
     * @test
     * @group noFramework
     */
    public function get_list_of_students_based_on_major(){
        $mockMajor = new StudentInfo(['major' => 'test']);

        $this->studentInfoModelRepo
        ->shouldReceive('getStudentsByMajor')
        ->with("test")
        ->once()
        ->andReturn($mockMajor);

        $this->assertEquals($mockMajor, $this->service->getStudentsByMajor("test"));
    }

    /**
     * @test
     * @group noFramework
     */
    public function get_list_of_students_based_on_grad_date() {
        $mockGradDate = new StudentInfo(['grad_date' => 'Spring 2019']);

        $this->studentInfoModelRepo
            ->shouldReceive('getStudentsByGradDate')
            ->with("Spring 2019")
            ->once()
            ->andReturn($mockGradDate);
        $this->assertEquals($mockGradDate, $this->service->getStudentsByGradDate("Spring 2019"));
    }

    /**
     * @test
     * @group noFramework
     */
    public function get_list_of_students_based_on_college() {
        $mockCollege = new StudentInfo(['college' => 'test']);

        $this->studentInfoModelRepo
            ->shouldReceive('getStudentsByCollege')
            ->with("test")
            ->once()
            ->andReturn($mockCollege);

        $this->assertEquals($mockCollege, $this->service->getStudentsByCollege("test"));
    }
}
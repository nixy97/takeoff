<template>
	<div class="pt-4">
        <div class="text-primary">
            Add new students
        </div>
        <div class="input-group mt-2 mb-3">
        <input type="text" class="form-control" placeholder="Enter a student's email" maxlength="50" v-model="form.email">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" @click="sendInvite">Add</button>
            </div>
        </div>
	</div>
</template>



<script>
import invitations from './../../api/admin.js'

export default {
	data () {
        return {
            form: {
                email: ''
            }
        }
    },
    methods: {
        sendInvite() {
            invitations.inviteUserAPI (
                this.form,
                success => {
                    console.log('TODO: Invitation sent alert')
                },
                error => {
                    console.log(error)
                }
            )
        }
    }
};
</script>

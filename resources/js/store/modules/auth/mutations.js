export default {
    UPDATE_SESSION(state, payload) {
        window.localStorage.setItem("userId", payload.user_id);
        window.localStorage.setItem("tokenType", payload.token_type);
        window.localStorage.setItem("token", payload.access_token);
        window.localStorage.setItem("expiration", payload.expires_at);
        window.localStorage.setItem("role", payload.role);
    },

    CLEAR_SESSION(state) {
        window.localStorage.clear();
    },

    SET_USER_INFO(state, payload) {
        if (payload.firstName) {
            state.user = {
                ...state.user,
                ...payload,
            };
        }
        else{
            state.user = {
                'major': payload.major,
                'firstName': payload.first_name,
                'lastName': payload.last_name,
                'college': payload.college,
                'funFacts': payload.fun_facts,
                'research': payload.research,
                'biography': payload.bio,
                'role': 'student',
                'expectedGrad': payload.grad_date,
                'academicInterests': payload.academic_interest.split(',')
            }
        }
    },

    SET_ADMIN_INFO(state, payload) {
        if (payload.firstName) {
            state.user = {
                ...state.user,
                ...payload,
            };
        }
        else{
            state.user = {
                'title': payload.title,
                'firstName': payload.first_name,
                'lastName': payload.last_name,
                'role': 'admin'
            }
        }
    }
};

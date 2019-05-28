'use strict';

app.factory('loginService', function($http, $location, sessionService) {
    return {
        login: function(user, $scope) {
            var validate = $http.post('api/login', user);
            validate.then(function(response) {
                var uid = response.data.user;
                if (uid) {
                    sessionService.set('user', uid);
                    $location.path('/home');
                } else {
                    alert('Login Failed!')
                }
            });
        },
        logout: function() {
            sessionService.destroy('user');
            $location.path('/');
        },
        islogged: function() {
            var checkSession = $http.post('api/session');
            return checkSession;
        },
        fetchuser: function() {
            var user = $http.get('api/fetch');
            return user;
        }
    }
});
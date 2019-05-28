app.component('login', {
    templateUrl: 'components/login/login.html',
    controller: function LoginController($scope, $http, loginService) {

        $scope.login = function (user) {
            loginService.login(user, $scope);
        }
    }
});
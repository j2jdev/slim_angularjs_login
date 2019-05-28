app.component('home', {
    templateUrl: 'components/home/home.html',
    controller: function HomeController($scope, $http, loginService) {

        $scope.logout = function () {
            loginService.logout();
        }

        var userrequest = loginService.fetchuser();
        userrequest.then(function (response) {
            $scope.user = response.data[0];
        });


    }
});
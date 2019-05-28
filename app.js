var app = angular.module('myApp', ['ngRoute']);
app.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when('/login', {
            template: '<login></login>'
        })
        .when('/home', {
            template: '<home></home>'
        })
        .otherwise({
            redirectTo: "/login"
        });

    $locationProvider.hashPrefix('')
});

app.run(function ($rootScope, $location, loginService) {

    $rootScope.$on('$routeChangeSuccess', function (event, next, prev) {
        // console.log(next.$$route.originalPath);
        $rootScope.location = next.$$route.originalPath

        var routePermit = [next.$$route.originalPath];
        if (routePermit) {

            var connected = loginService.islogged();
            connected.then(function (response) {

                if (response.data == 'authentified') {
                    if (routePermit == '/login') {
                        $location.path('/home')
                    }
                } else {
                    if (routePermit != '/login') {
                        $location.path('/login')
                    }
                }
            });
        }

    });

});
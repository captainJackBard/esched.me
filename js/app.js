var app = angular.module('app', ['backand', 'ngRoute']);

app.config(function(BackandProvider, $routeProvider) {
    BackandProvider.setAppName('dodongx');
    BackandProvider.setSignUpToken('a7a341b4-d4b3-46b1-a786-c7c4c1776719');
    BackandProvider.setAnonymousToken('047a5ffa-e1ee-457e-8141-a6f3ab54d8ca');
    BackandProvider.runSigninAfterSignup(true);
});


app.service('AuthService', function(Backand) {
    var vm = this;
    
    vm.signup = function(firstname, lastname, email, password, confirmPassword) {
        return Backand.signup(firstname, lastname, email, password, confirmPassword);
    }

    vm.login = function(email, password) {
        return Backand.signin(email, password);
    }
});

app.controller('AuthController', function($http, Backand, AuthService, $location) {
    var vm = this;

    vm.fbSignIn = function() {
        Backand.socialSignin('facebook')
        .then(function (result) {
                var req = {
                url: "login",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: $.param({email: Backand.getUsername()})
            }
            $http(req)
            .then(function(data) {
                window.location = "dashboard";
                console.log(data.data);
            });
        });
    }

    vm.login = function(email, password) {
        AuthService.login(email, password)
        .then(function (result) {
                var req = {
                url: "login",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: $.param({email: Backand.getUsername()})
            }
            $http(req)
            .then(function(data) {
                window.location = "dashboard";
                console.log(data);
            });
        })
        .catch(onSignupError);
    }

    vm.register = function(firstname, lastname, email, password, confirmPassword) {
        AuthService.signup(firstname, lastname, email, password, confirmPassword)
        .then(onSignupSuccess)
        .catch(onSignupError);
        vm.message = "Please Verify your email before Signing-in";
    }

    function onSignupSuccess(result) {
        console.log(result);
        toastr.clear();
        toastr.success("Registration success! Please check your email!");
        window.location = "user/login";
    }

    function onSignupError(error) {
        if(error.error_description) {
            toastr.clear();
            toastr.error(error.error_description);
            vm.flash = {
                type: "error",
                msg: error.error_description
            };
        }
        console.log('Error: ' + JSON.stringify(error));
        //window.location = '/esched.me/user/login';
    }

});

app.run(function($rootScope, Backand, $http) {
    $rootScope.$on(Backand.EVENTS.SIGNIN, function(event, data) {
        
    })
});
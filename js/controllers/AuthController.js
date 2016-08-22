(function() {
    'use strict';

    var app = angular.module('app');

    app.controller('AuthController', function($http, Backand, AuthService, $location) {
        var vm = this;

        vm.fbSignIn = function() {
            Backand.socialSignin('facebook')
            .then(loginSuccess);
        }

        vm.login = function(email, password) {
            AuthService.login(email, password)
            .then(loginSuccess)
            .catch(onSignupError);
        }

        function loginSuccess(result) {
            vm.flash = null;
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
                window.location = "/dashboard";
                console.log(data);
            });
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
                    msg: error.error_description,
                    type: "error"
                };
            }
            console.log('Error: ' + JSON.stringify(error));
        }

    });

})();
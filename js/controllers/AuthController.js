(function() {
    'use strict';

    var app = angular.module('app');

    app.controller('AuthController', function($http, Backand, AuthService, $location) {
        var vm = this;
        console.log(Backand.getUserRole())
        vm.fbSignIn = function() {
            vm.flash = null;
            Backand.socialSignin('facebook')
            .then(loginSuccess);
        }

        vm.register = function(firstname, lastname, email, password, confirmPassword) {
            vm.flash = null;
            AuthService.signup(firstname, lastname, email, password, confirmPassword)
            .then(onSignupSuccess)
            .catch(onSignupError);
            vm.flash = {
                msg: "Please Verify your email before Signing-in",
                type: "info"
            };
        }

        function onSignupSuccess(result) {
            console.log(result);
            toastr.clear();
            toastr.success("Registration success! Please check your email!");
            //window.location = "user/login";
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
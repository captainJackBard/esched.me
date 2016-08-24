(function() {
    'use strict';

    var app = angular.module('app');

    app.controller('AuthController', function($http, Backand, AuthService, $location) {
        var vm = this;

        vm.fbSignIn = function() {
            vm.flash = null;
            Backand.socialSignin('facebook')
                .then(function() {
                    var msg = 'Logging in....';
                    var req = {
                        url: "login",
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        data: $.param({email: Backand.getUsername()})
                    }
                    vm.promise = $http(req);
                    vm.promise.then(function(data) {
                        window.location = "/dashboard";
                        console.log(data);
                    });
                    toastr.clear();
                    toastr.info(msg);
                    vm.flash = {
                        msg: msg,
                        type: "info"
                    }
                });

        }

        // function loginSuccess(result) {
        //     var msg = 'Logging in....';
        //     var req = {
        //         url: "login",
        //         method: "POST",
        //         headers: {
        //             'Content-Type': 'application/x-www-form-urlencoded'
        //         },
        //         data: $.param({email: Backand.getUsername()})
        //     }
        //     vm.promise = $http(req);
        //     vm.promise.then(function(data) {
        //         window.location = "/dashboard";
        //         console.log(data);
        //     });
        //     toastr.clear();
        //     toastr.info(msg);
        //     vm.flash = {
        //         msg: msg,
        //         type: "info"
        //     }
        // }

        vm.register = function(firstname, lastname, email, password, confirmPassword) {
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
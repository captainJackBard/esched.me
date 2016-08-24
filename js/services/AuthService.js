(function() {
    'use strict';

    var app = angular.module('app');

    app.service('AuthService', ['Backand', '$http', AuthServiceFunction]);

    function AuthServiceFunction(Backand, $http) {
        var vm = this;
        
        vm.signup = function(firstname, lastname, email, password, confirmPassword) {
            if (password === confirmPassword) {
                var passcode = new jsSHA("SHA-1", "TEXT");
                passcode.update(password);
                var hash = passcode.getHash("HEX");
                return Backand.signup(firstname, lastname, email, password, confirmPassword, {"password": hash});
            } else {
                toastr.error("Password do not match");

                return;
            }
        }

        vm.checkEmail = function(email){
            var url = Backand.getApiUrl() + '/1/query/data/GetUserByEmail';

            return $http.get({
                url: url,
                method: 'GET',
                params: {
                    parameters: {
                        email: email.toString()
                    }
                }
            });
        }

    }
})();
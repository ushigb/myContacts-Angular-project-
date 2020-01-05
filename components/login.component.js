contactsApp.
        component('login', {
            templateUrl: 'templates/login.template.html',
            controller: function LoginController($http, userService, loginService) {
                let self = this;
                self.user = {};
                self.error = '';
                self.isLoggedIn = false;
                self.getUser = function () {
                    loginService.getUser().then(function (response) {
                        console.log(response);
                        if (response.data !== undefined && response.data.length > 0) {
                            self.isLoggedIn = true;
                            self.user = response.data[0];
                            userService.setUser(self.user);
                        }
                    });
                };

                self.getUser();

                self.login = function (username, password) {
                    console.log(username, password);
                    var data = {
                        name: username,
                        pass: password
                    };

                    if (!username || !password) {
                        self.error = 'Missing username or password';
                        return;
                    }

                    loginService.login(data).then(function (response) {
                        console.log(response);
                        if (response.status === 200) {
                            self.getUser();
                            self.isLoggedIn = true;
                            self.error = '';
                        } else {
                            self.error = 'Unable to login';
                        }
                    }, function (error) {
                        console.log(error);
                        self.error = 'Unable to login. ' + error.statusText;
                    });
                };

                self.logOut = function () {
                    loginService.logOut().then(function (response) {
                        console.log(response);
                        if (response.status === 200) {
                            self.isLoggedIn = false;
                            self.user.name = '';
                            self.error = '';
                        } else {
                            self.error = 'Unable to logout';
                        }
                    }, function (error) {
                        console.log(error);
                        self.error = 'Unable to logout. ' + error.statusText;
                    });
                };
            }
        });




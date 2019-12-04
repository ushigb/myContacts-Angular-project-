contactsApp.service('userService', function () {
    let self = this;
    self.user = '';

    self.setUser = function (user) {
        console.log(user);
        self.user = user;
    };

    self.getUser = function () {
        return self.user;
    };
});



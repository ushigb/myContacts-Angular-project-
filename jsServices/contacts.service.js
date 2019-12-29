contactsApp.service('contactsService', function ($http) {
    let self = this;
    self.contacts = [];

    self.save = function (data) {
        console.log(data);

        return $http.post("http://mycontacts.test/contacts.php", data);
    };

    self.getContacts = function () {
        return $http.get("http://mycontacts.test/contacts.php");
    };

    self.deleteContact = function(contact_id) {
        const confirmed = confirm("Are you sure you want to delete this post?");
        if (confirmed) {
            return $http.delete("http://mycontacts.test/contacts.php?id=" + contact_id);
        }
        return false;
    };   
});
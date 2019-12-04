"use strict";

contactsApp.
  component('contacts', {
    templateUrl: 'templates/contacts.template.html',
    controller: function ContactsController($http, userService, contactsService) {
    let self = this;
    self.contacts = [];
    self.error = '';
    self.singleContact = '';
    self.loading = true;

//    self.getSingleContact = function(contact) {
//      self.singleContact = contact;
//    };

    self.getContacts = function() {
      self.loading = true;
      contactsService.getContacts().then(function(response){
          self.contacts = response.data;
          self.loading = false;
          self.singleContact = '';
          self.showEditor = false;
          console.log(response);
      });
    };

    self.getContacts();

    self.newContact = function() {
      self.showEditor = true;
      self.singleContact = '';
      self.contacts = [];
    };
    
    self.save = function(name, phone, email, user_id) {
      const user = userService.getUser();

      console.log(user);
      const data = {
        
        name: name,
        phone: phone,
        email: email,
        user_id: user_id
      };

      contactsService.save(data).then(function(response){
        if (response.status === 200) {
          self.getContacts();
        }
      }, function(error) {
        self.error = error;
      });
    };

    self.deleteContact = function(contact_id) {
      console.log(contact_id);
      contactsService.deleteContact(contact_id).then(function(response){
        if (response.status === 200) {
          self.getContacts();
        }
      }, function(error) {
        self.error = error;
      });
    };
    
    self.editContact = function(contact_id) {
      console.log(contact_id);
      contactsService.editContact(contact_id).then(function(response){
        if (response.status === 200) {
          self.getContacts();
        }
      }, function(error) {
        self.error = error;
      });
    };
  }
});





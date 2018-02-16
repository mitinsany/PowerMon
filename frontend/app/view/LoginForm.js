Ext.define('PowerMon.view.LoginForm', {
    extend: 'Ext.window.Window',
    alias: 'widget.loginform',
    requires: ['PowerMon.controller.LoginController', 'Ext.form.Panel'],
    title: 'Please Log In',
    autoShow: true,
    height: 150,
    width: 300,
    closable: false,
    resizable: false,
    layout: 'fit',
    items: [
        {
            xtype: 'form',
            bodyPadding: 5,
            defaults: {
                xtype: 'textfield',
                anchor: '100%'
            },
            items: [
                {
                    fieldLabel: 'Login:',
                    name: 'login',
                    allowBlank: false
                },
                {
                    fieldLabel: 'Password:',
                    name: 'password',
                    allowBlank: false
                }
            ],
            buttons: [
                {
                    text: 'Log in',
                    formBind: true,
                    disabled: true,
                    handler: function (b, e) {
                        var formDialog = b.up('loginform');
                        var form = b.up('form');
                        formDialog.fireEvent('login', formDialog, form, form.getValues())
                    }
                }
            ]
        }
    ]
})
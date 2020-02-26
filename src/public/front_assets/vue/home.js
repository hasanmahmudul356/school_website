class Errors{
    constructor(){
        this.errors = {};
        this.arr_errors = [];
    }
    get(field){
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }
    record(errors){
        this.errors = errors;
    }
}
new Vue({
    el: '#Vue_component_wrapper',
    data: {
        app_url: baseURL,
        FormData: {
            firstname: '',
            lastname: '',
            phone: '',
            subject: '',
            message: '',
        },
        SuccessMessge: '',
        error : new Errors(),
    },
    methods: {
        SubmitContact: function () {
            const _this = this;
            let URL = this.app_url + '/contactform/add';
            _this.error.record([]);
            $.ajax({
                url: URL,
                type: "post",
                data: {
                    data: _this.FormData,
                },
                success: function (response) {
                    if (parseInt(response.status) === 2000) {
                        _this.SuccessMessge = response.msg;
                        _this.FormData.firstname = '';
                        _this.FormData.lastname = '';
                        _this.FormData.phone = '';
                        _this.FormData.subject = '';
                        _this.FormData.message = '';
                    }else if (parseInt(response.status) === 3000) {
                        _this.error.record(response.errors);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    _this.HttpRequest = false;
                    console.log(textStatus, errorThrown);
                }
            });
        },
    },
});

new Vue({
    el: '#Vue_component_subscriber',
    data: {
        app_url: baseURL,
        FormData: {
            email: '',
        },
        SuccessMessge: '',
    },
    methods: {
        SubmitContact: function () {
            const _this = this;
            let URL = this.app_url + '/subscribe/add';
            $.ajax({
                url: URL,
                type: "post",
                data: {
                    data: _this.FormData,
                },
                success: function (response) {
                    _this.FormData.email = '';
                    if (parseInt(response.status) === 2000) {
                        _this.SuccessMessge = response.msg;
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    _this.HttpRequest = false;
                    console.log(textStatus, errorThrown);
                }
            });
        },
    },
});


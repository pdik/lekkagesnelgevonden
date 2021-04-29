require('./bootstrap');

require('alpinejs');

window.removeItem = function (id, ) {
          let toast = Swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-danger m-1',
                    input: 'form-control'
                }
            });
            toast.fire({
                title: 'Zeker weten?',
                text: 'Het is niet mogelijk om dit ongedaan te maken',
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-danger m-1',
                    cancelButton: 'btn btn-secondary m-1'
                },
                confirmButtonText: 'Ja, verwijder!',
                html: false,
                preConfirm: e => {
                    return new Promise(resolve => {
                        setTimeout(() => {
                            resolve();
                        }, 60);
                    });
                }
            }).then(result => {
                if (result.value) {
                     $.ajax(
                         {
                             type: "POST",
                             url: "/api/v1/report/row/"+id,
                             data: {
                                 _method: "delete",
                             },

                             success: function (response) {
                                 if(response){
                                     window.reload();
                                    toast.fire('Verwijderd!', 'Item is verwijderd', 'success');
                                 }else{
                                      toast.fire('Error', 'Mm er is iets niet helemaal goed gegaan...', 'error');
                                 }
                             },
                         });
                    // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                } else if (result.dismiss === 'cancel') {
                    toast.fire('Pff', 'Gellukkig  je item is niet verwijderd', 'error');
                }
            });
}
window.removeReport = function (id, ) {
          let toast = Swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-danger m-1',
                    input: 'form-control'
                }
            });
            toast.fire({
                title: 'Zeker weten?',
                text: 'Het is niet mogelijk om dit ongedaan te maken',
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-danger m-1',
                    cancelButton: 'btn btn-secondary m-1'
                },
                confirmButtonText: 'Ja, verwijder!',
                html: false,
                preConfirm: e => {
                    return new Promise(resolve => {
                        setTimeout(() => {
                            resolve();
                        }, 60);
                    });
                }
            }).then(result => {
                if (result.value) {
                     $.ajax(
                         {
                             type: "POST",
                             url: "/api/v1/report/"+id,
                             data: {
                                 _method: "delete",
                             },

                             success: function (response) {
                                 if(response){
                                    toast.fire('Verwijderd!', 'Rapport is verwijderd', 'success');
                                 }else{
                                      toast.fire('Error', 'Mm er is iets niet helemaal goed gegaan...', 'error');
                                 }
                             },
                         });
                    // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                } else if (result.dismiss === 'cancel') {
                    toast.fire('Pff', 'Gellukkig  je rapport is niet verwijderd', 'error');
                }
            });
}
window.SendEmail = function (id, customer) {

          let toast = Swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-warning m-1',
                    input: 'form-control'
                }
            });
            toast.fire({
                title: 'Verstuur rapport',
                text: 'Het rapport wordt verstuurdt via de mail, naar de klant',
                icon: 'success',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-secondary m-1'
                },
                confirmButtonText: 'Ja, verstuur!',
                html: false,
                preConfirm: e => {
                    return new Promise(resolve => {
                        setTimeout(() => {
                            resolve();
                        }, 60);
                    });
                }
            }).then(result => {
                if (result.value) {
                     $.ajax(
                         {
                             type: "POST",
                             url: "/api/v1/report/"+id+"/send/",
                             data: {
                                 _method: "post",
                                 customer: customer,
                             },

                             success: function (response) {
                                 if(response){
                                     window.reload();
                                    toast.fire('Verstuurd!', 'Rapport is verzonden', 'success');
                                 }else{
                                      toast.fire('Error', 'Mm er is iets niet helemaal goed gegaan...', 'error');
                                 }
                             },
                         });
                    // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                } else if (result.dismiss === 'cancel') {
                }
            });
}

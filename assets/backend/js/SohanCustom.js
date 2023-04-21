class SohanCustom{
   static preloader_start()
    {
        $('.sohan_custom_loader_wrapper').show();
    }

  static  preloader_end()
    {
        $('.sohan_custom_loader_wrapper').hide();
    }


    static load_pos_cart_table()
    {
        $('.pos_cart_table').load(location.href + ' .pos_cart_table');
    }

    static success_message(msg = null){

        Swal.fire({
            position: 'top-end',
            toast:true,
            icon: 'success',
            title: msg ?? 'Item Success',
            showConfirmButton: false,
            timer: 1500
        })

    }

    static error_message(msg = null){
        Swal.fire({
            position: 'top-end',
            toast:true,
            icon: 'error',
            title: msg ?? 'Something Wrong..!',
            showConfirmButton: false,
            timer: 1500
        })
    }

    static info_message(msg = null){
        Swal.fire({
            position: 'top-end',
            toast:true,
            icon: 'info',
            title: msg ?? 'Oopps Something Wrong..!',
            showConfirmButton: false,
            timer: 1500
        })
    }
}
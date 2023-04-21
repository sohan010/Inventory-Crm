<style>
    body {
        /*background-color: #214;*/
        margin: 0;
    }

    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
    }

    .preloader {
        display: block;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 5px solid transparent;
        border-top-color: #FF4500;
        position: relative;
        animation: rotating 2.5s infinite ease;
        -webkit-animation: rotating 2.5s infinite linear;
    }
    .preloader:after, .preloader:before {
        content: "";
        position: absolute;
        border-radius: inherit;
        border: inherit;
    }
    .preloader:after {
        top: 5px;
        left: 5px;
        width: 180px;
        height: 180px;
        border-top-color: #FF8C00;
        animation: rotating 2s infinite ease;
        -webkit-animation: rotating 2s infinite linear;
    }
    .preloader:before {
        top: 15px;
        left: 15px;
        width: 160px;
        height: 160px;
        border-top-color: #FF1493;
        animation: rotating 1.5s infinite ease;
        -webkit-animation: rotating 1.5s infinite linear;
    }

    @keyframes  rotating {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    @-webkit-keyframes rotating {
        0% {
            transform: rotate(0deg);
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
        }
    }
</style><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/preloader/css.blade.php ENDPATH**/ ?>
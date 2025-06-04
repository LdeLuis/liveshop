<style>
    footer{
        width: 100%;
        height: 10rem;
    }

    footer .f-main{
        width: 100%;
        height: 6.5rem;
        position: relative;
        display: flex;
        justify-content: right;
        padding: 1rem 8rem;
        gap: 1.5rem;
    }

    footer .f-main .imagen1{
        width: 15rem;
        left: 50%;
        top: 0;
        position: absolute;
        transform: translate(-50%,-50%);
    }

    footer .f-main a i{
        color: #feb8ce;
        font-size: 1.8rem
    }

    footer .f-down{
        width: 100%;
        height: 3.5rem;
        display: flex;
        justify-content: center;
        align-items: start;
    }

    footer .f-down p{
        color: var(--blue);
        font-size: 1.2rem;
        letter-spacing: 0.1rem;
    }

    @media(min-width: 576px) and (max-width: 992px) {
        footer .f-main{
            padding: 1rem 4rem;
        }
    }

    @media(min-width: 0px) and (max-width: 576px) {
        footer .f-main .imagen1{
            width: 10rem;
            top: -2rem;
        }

        footer .f-down p{
            font-size: 0.8rem;
            text-align: center;
        }
    }

</style>

<footer>
    <div class="f-main">
        <a href="{{route('front.home')}}"><img class="imagen1" src="{{asset('img/design/recursos/logo.png')}}" alt=""></a>
        
        <a href="{{$config->whatsapp}}"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="{{$config->instagram}}"><i class="fa-brands fa-instagram"></i></a>
        <a href="{{$config->facebook}}"><i class="fa-brands fa-facebook-f"></i></a>
    </div>
    <div class="f-down">
        <p>DISEÑO POR WOZIAL MARKETING LOVERS 2025</p>
    </div>
</footer>
<!-- pop up aviso -->
<div id="popup" class="popup">
    <div class="BoxPop">
        <div class="centralizado">
            <button id="close" class="float:right btn btn-success">x</button>
            <div style="clear:both"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h2 class="text-center tit">Vistite Nossa Loja Online</h2>
                        <h3 class="text-center subtit">Compre sem sair de casa</h3>
                        <div class="about_btn botao3">
                            <a class="boxed-btn3" target="_blank" href="http://www.novaeracarimbos.com.br/">Loja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .botao3 {
        margin-left: 45%;
        margin-right: 50%;
    }

    .tit {
        font-size: 33px;
        padding: 40px 0px 0px 0px;
        color: #6d6d6d;
        text-transform: capitalize;
    }

    .subtit {
        font-size: 15px;
        color: #6d6d6d;
    }

    .icone {
        color: #00007b;
        font-size: 40px;
    }

    #popup {
        position: fixed;
        margin: 0 auto;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0px 0px 50px 2px #000;
        z-index: 9999;
        height: auto;
        width: 705px;
        z-index: 999999999999999;
    }

    .BoxPop {
        width: 100%;
        display: block;
        height: 220px;
        background: white;
        border-radius: 13px 13px 13px 13px;
    }

    @media only screen and (max-width: 600px) {

        #popup {
            width: 370PX;
        }

        .botao3 {
            margin-left: 37%;
            margin-right: 50%;
        }

        .p-pop {
            display: flex;
            top: 16%;
            left: 3%;
            right: 3%;
            position: absolute;
            font-size: 14px;
            font-weight: 500;
            line-height: 26px;
            color: #5c5c5c;
        }

        .BoxPop {
            width: 100%;
            display: block;
            height: 270px;
            background: white;
            border-radius: 13px 13px 13px 13px;
        }

        .tit {
            font-size: 33px;
            padding: 44px 0px 0px 0px;
            color: #6d6d6d;
        }
    }

    .p-pop {
        display: flex;
        top: 16%;
        left: 3%;
        right: 3%;
        position: absolute;
        font-size: 14px;
        font-weight: 500;
        line-height: 26px;
        color: #5c5c5c;
    }

    #close {
        border: none;
        background-color: #ce3434;
        width: 67px;
        float: right;
        position: absolute;
        right: -1px;
        z-index: 1;
    }
</style>


<script type="text/javascript">
    var close = document.getElementById('close');
    var popup = document.getElementById('popup');

    close.addEventListener("click", function() {
        popup.style.display = 'none';
    });
</script>
<!-- pop up aviso fim-->
<style>
.whats-popup{
  position:fixed;
  width:300px;
  height:160px;
  bottom: 70px;
  right:15px;
  background:#fff;
  -webkit-box-shadow: -2px 10px 18px 0px rgba(0,0,0,1);
-moz-box-shadow: -2px 10px 18px 0px rgba(0,0,0,1);
box-shadow: -2px 10px 18px 0px rgba(0,0,0,0.5);
  padding:2rem;
  border-radius:15px;
    margin-bottom:15px;
    z-index: 99999;
}
.whats-flutuante p{font-size:1rem; color:#7f8c8d}
.whats-flutuante .btn-fechar{
  position:absolute;
  right:15px;
  top:15px;
  border:0;
  background:#e74c3c;
  border-radius:100%;
  width:30px;
  height:30px;
  color:#fff;
}
.whats-flutuante .content{
  display:flex;
}
.whats-flutuante input{
  border:0;
  padding:1rem;
  width:80%;
}
.whats-flutuante .btn-enviar{
  border:0;
  padding:1rem 1.2rem;
  border-radius:100%;
  background:none;
  -webkit-box-shadow: -2px 10px 18px 0px rgba(0,0,0,1);
-moz-box-shadow: -2px 10px 18px 0px rgba(0,0,0,1);
box-shadow: -2px 10px 18px 0px rgba(0,0,0,0.5);
  
}
.whatsapp {
  position:fixed;
  width:60px;
  height:60px;
  bottom:15px;
  right:15px;
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:30px;
  z-index:100;
}

.whatsapp-icon {
  margin-top:13px;
}


</style>
<div class="whats-flutuante">
  <div class="whats-popup">
    <button class='btn-fechar'><i class="fas fa-times"></i></button>
    <p>Olá, precisa de ajuda?</p>
    <div class="content">
        <input type="text" placeholder="Enviar Mensagem..." class='msg-whats'>
        <button class='btn-enviar'><i class="fas fa-paper-plane"></i></button>
      </div>
  </div>
  <div class="whatsapp">
    <i class="fab fa-whatsapp whatsapp-icon"></i>
  </div>
  
  
</div>
<script>
$(function(){
  $('.whats-popup').hide();
  $('.whatsapp').click(function(){
    $('.whats-popup').fadeToggle('fast');
  })
  $('.btn-fechar').click(function(){
    $('.whats-popup').fadeToggle('fast');
  })
  $('.btn-enviar').click(function(){
    var msg = $('.msg-whats').val();
    window.open('https://wa.me/551191234567?text='+msg); 
  })
})
</script>
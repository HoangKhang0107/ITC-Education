/* Demo purposes only */
$(".hover").mouseleave(
    function () {
      $(this).removeClass("hover");
    }
  );
  $(function() {
    var Accordion = function(el, multiple) {
      this.el = el || {};
      this.multiple = multiple || false;
  
      // Variables privadas
      var links = this.el.find('.link');
      // Evento
      links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }
  
    Accordion.prototype.dropdown = function(e) {
      var $el = e.data.el;
        $this = $(this),
        $next = $this.next();
  
      $next.slideToggle();
      $this.parent().toggleClass('open');
  
      if (!e.data.multiple) {
        $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
      };
    } 
  
    var accordion = new Accordion($('#accordion'), false);
  });
  
    
    var count=1;
  $(document).ready(function()
  {
    function ktmatk()
        {
            var regten=/^(([A-Z]{2,4})([0-9]{3,5}))$/;
            var ten=$("#form-matk").val();
            if(regten.test(ten)  )
            {
                
                $("#matk").html("*")
               return true;

            }
            else
            {
                $("#matk").html("Sai định dạng")
                return false;
            }
        }
        $("#form-matk").blur(ktmatk)
        //-------------//
        function ktmand()
        {
            var regten=/^(([A])([D])([M])([0-9]{3})([_])([A-Z]{1}[a-z]{1,10}))$/;
            var ten=$("#form-manguoidung").val();
            if(regten.test(ten))
            {
                $("#mand").html("*")
               return true;
            }
            else
            {
                $("#mand").html("Sai định dạng")
                return false;
            }
        }
        $("#form-manguoidung").blur(ktmand)
        //-----------//
        // function ktvaitr()
        // {
        //     // var regten=/^(([1-9]{2}))$/;
        //     var ten=$("#form-vaitro").val();
        //     if(regten.test(ten))
        //     {
        //         $("#id1").html("*")
        //        return true;
        //     }
        //     else
        //     {
        //         $("#vaitr").html("Sai định dạng")
        //         return false;
        //     }
        // $("#form-vaitro").blur(ktvaitr)
        // }
       
        //     $("#form-vaitro").blur(ktvaitr)
           
        //----------//
        function ktten()
        {
            var regten=/^([A-Z]{1}[a-z]*\s)*([A-Z]{1}[a-z]*)$/;
            var ten=$("#form-tennguoidung").val();
            if(regten.test(ten))
            {
                $("#ten").html("*")
               return true;
            }
            else
            {
                $("#ten").html("Sai định dạng")
                return false;
            }
        }
        $("#form-tennguoidung").blur(ktten)
        //------------//
        function ktsdt()
        {
            var regten=/^([0-9]{10})$/;
            var ten=$("#form-sodienthoai").val();
            if(regten.test(ten))
            {
                $("#sdt").html("*")
               return true;
            }
            else
            {
                $("#sdt").html("Sai định dạng")
                return false;
            }
        }
        $("#form-sodienthoai").blur(ktsdt)
        //------------//
        function ktemail()
        {
            var regten=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            var ten=$("#form-email").val();
            if(regten.test(ten))
            {
                $("#email").html("*")
               return true;
            }
            else
            {
                $("#email").html("Sai định dạng")
                return false;
            }
        }
        $("#form-email").blur(ktemail)
        //------------//
        
    })


/*!

 =========================================================
 * Bootstrap Wizard - v1.1.1
 =========================================================
 
 * Product Page: https://www.creative-tim.com/product/bootstrap-wizard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/bootstrap-wizard/blob/master/LICENSE.md)
 
 =========================================================
 
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 */

// Get Shit Done Kit Bootstrap Wizard Functions

searchVisible = 0;
transparent = true;

$(document).ready(function(){

    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/i.test(value);
      }, "El campo solo puede contener letras.");
      
    // Code for the Validator
    var $validator = $('.wizard-card form').validate({
        rules: {
          Nombres: {
            required: true,
            minlength: 3,
            lettersonly: true
            
          },
          apellidoPaterno: {
            required: true,
            minlength: 3,
            lettersonly: true
          },
          apellidoMaterno: {
            required: true,
            minlength: 3,
            lettersonly: true
          },
          edadTutor: {
            required: true,
            number: true
          },
          parentesco: {
            required: true
          },
          NombresMenor: {
            required: true,
            minlength: 3,
            lettersonly: true
          },
          apellidoPaternoMenor: {
            required: true,
            minlength: 3,
            lettersonly: true
          },
          apellidoMaternoMenor: {
            required: true,
            minlength: 3,
            lettersonly: true
          },
          edadmenor: {
            required: true
          }
          ,
          sexoMenor: {
            required: true
          } ,
          codiopostal: {
            required: true
          }
        },
        messages: {
          Nombres: {
            required: "El campo Nombres es obligatorio.",
            minlength: "El campo Nombres debe tener al menos {0} caracteres."
          },
          apellidoPaterno: {
            required: "El campo Apellido Paterno es obligatorio.",
            minlength: "El campo Apellido Paterno debe tener al menos {0} caracteres."
          },
          apellidoMaterno: {
            required: "El campo Apellido Materno es obligatorio.",
            minlength: "El campo Apellido Materno debe tener al menos {0} caracteres."
          },
          edadTutor: {
            required: "El campo Edad Tutor es obligatorio.",
            number: "El campo Edad Tutor debe ser un número."
          },
          parentesco: {
            required: "Debe seleccionar un parentesco."
          },
          NombresMenor: {
            required: "El campo Nombres es obligatorio.",
            minlength: "El campo Nombres debe tener al menos {0} caracteres."
          },
          apellidoPaternoMenor: {
            required: "El campo Apellido Paterno es obligatorio.",
            minlength: "El campo Apellido Paterno debe tener al menos {0} caracteres."
          },
          apellidoMaternoMenor: {
            required: "El campo Apellido Materno es obligatorio.",
            minlength: "El campo Apellido Materno debe tener al menos {0} caracteres."
          },
          edadmenor: {
            required: "Debe seleccionar un edad."
          },
          sexoMenor: {
            required: "Debe seleccionar un sexo."
          }
          ,
          codiopostal: {
            required: "El codigo postal es obligatorio"
          }

        }
      });
      

    // Wizard Initialization
  	$('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',

        onNext: function(tab, navigation, index) {
        	var $valid = $('.wizard-card form').valid();
        	if(!$valid) {
        		$validator.focusInvalid();
        		return false;
        	}
        },

        onInit : function(tab, navigation, index){

          //check number of tabs and fill the entire row
          var $total = navigation.find('li').length;
          $width = 100/$total;
          var $wizard = navigation.closest('.wizard-card');

          $display_width = $(document).width();

          if($display_width < 600 && $total > 3){
              $width = 50;
          }

           navigation.find('li').css('width',$width + '%');
           $first_li = navigation.find('li:first-child a').html();
           $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
           $('.wizard-card .wizard-navigation').append($moving_div);
           refreshAnimation($wizard, index);
           $('.moving-tab').css('transition','transform 0s');
       },

        onTabClick : function(tab, navigation, index){

            var $valid = $('.wizard-card form').valid();

            if(!$valid){
                return false;
            } else {
                return true;
            }
        },

        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;

            var $wizard = navigation.closest('.wizard-card');

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $($wizard).find('.btn-next').hide();
                $($wizard).find('.btn-finish').show();
            } else {
                $($wizard).find('.btn-next').show();
                $($wizard).find('.btn-finish').hide();
            }

            button_text = navigation.find('li:nth-child(' + $current + ') a').html();

            setTimeout(function(){
                $('.moving-tab').text(button_text);
            }, 150);

            var checkbox = $('.footer-checkbox');

            if( !index == 0 ){
                $(checkbox).css({
                    'opacity':'0',
                    'visibility':'hidden',
                    'position':'absolute'
                });
            } else {
                $(checkbox).css({
                    'opacity':'1',
                    'visibility':'visible'
                });
            }

            refreshAnimation($wizard, index);
        }
  	});


    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });

    $('[data-toggle="wizard-radio"]').click(function(){
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked','true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function(){
        if( $(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked','true');
        }
    });

    $('.set-full-height').css('height', 'auto');

});



 //Function to show image before upload

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(window).resize(function(){
    $('.wizard-card').each(function(){
        $wizard = $(this);
        index = $wizard.bootstrapWizard('currentIndex');
        refreshAnimation($wizard, index);

        $('.moving-tab').css({
            'transition': 'transform 0s'
        });
    });
});

function refreshAnimation($wizard, index){
    total_steps = $wizard.find('li').length;
    move_distance = $wizard.width() / total_steps;
    step_width = move_distance;
    move_distance *= index;

    $wizard.find('.moving-tab').css('width', step_width);
    $('.moving-tab').css({
        'transform':'translate3d(' + move_distance + 'px, 0, 0)',
        'transition': 'all 0.3s ease-out'

    });
}

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};

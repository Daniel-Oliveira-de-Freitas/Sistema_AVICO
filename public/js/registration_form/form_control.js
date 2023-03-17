$(function () {
    let $sections = $('.form-content');
    function navigateTo(index) {
        $sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index > 0);
        let atTheEnd = index >= $sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [type=submit]').toggle(atTheEnd);
    }

    function currentIndex() {
        return $sections.index($sections.filter('.current'));
    }

    $('.form-navigation .previous').click(function () {
        if (document.getElementById('voluntario').checked && document.getElementById('associado').checked && currentIndex() == 4)
            navigateTo(currentIndex() - 1);
        else if (document.getElementById('voluntario').checked && currentIndex() == 4)
            navigateTo(currentIndex() - 2)
        else
            navigateTo(currentIndex() - 1);
    })

    $('.form-navigation .next').click(function () {
        $('.form-cadastro').parsley().whenValidate({
            group: 'block-' + currentIndex()
        }).done(function () {
            if (document.getElementById('voluntario').checked && document.getElementById('associado').checked && currentIndex() == 2)
                navigateTo(currentIndex() + 1)
            else if (document.getElementById('voluntario').checked && currentIndex() == 2)
                navigateTo(currentIndex() + 2)
            else
                navigateTo(currentIndex() + 1)
        })
    })

    $sections.each(function (index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });

    navigateTo(4);
});

$(document).ready(function() {
    let max_fields = 10;
    let wrapper = $("#field");
    let add_button = $("#add_form_field");

    let x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append( '<div class="row mt-3"><div class="mb-3 col"><label for="nome">Nome Completo</label><input class="form-control " type="text" name="test" id="test"></div><div class="mb-3 col-md-2"> <label for="idade">idade</label><div class="input-group"> <input class="form-control" type="text" name="test" id="test"><a href="#" class="delete"><i class="fa-solid fa-trash"></i></a></div> </div> </div>');
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});

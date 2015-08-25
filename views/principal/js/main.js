/**
 * Created by julian on 6/08/15.
 */
$(document).ready(function(){
    $(".item-menu").each(function(){
        $(this).click(function(){
            var op = this.dataset.link;
            if(op == 'censo'){
                window.location.href = '/censo.php';
            }else{
                window.location.href = '/picgpsnit?error=FALSE';
            }
        });
    });
});
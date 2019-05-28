
@if(session('success'))
<div id="success" style="bottom: 20px; right: 10px; z-index: 1000" class="position-fixed flex flex-column slideUp">

<div class="alert bg-success text-light my-2">{{session('success')}}</div>

</div>



<script>
let success = document.querySelector('#success');
setTimeout(function(){
success.classList.remove('slideUp');
success.classList.add('disapear');
}, 5000)
</script>


<style>
@keyframes SlideUp {
    from{
        transform: translateY(100%);
        opacity: 0;
    } to {
        transform: translateY(0%);
        opacity: 1;
    }
}

@keyframes Disapear {
    0% {
        transform: translateY(0%);
        opacity: 1;
    } 100% {
        transform: translateY(100%);
        opacity: 0;
    }
}



.slideUp {
    animation-name: SlideUp;
    animation-duration: 2s;
}

.disapear {
    animation-name: Disapear;
    animation-duration: 1s;
    opacity: 0;
}
</style>

@endif
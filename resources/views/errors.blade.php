@if($errors->any())
    <div id="errors" style="bottom: 20px; right: 10px; z-index: 1000" class="position-fixed flex flex-column slideUp">
@foreach($errors->all() as $error)
    <div class="alert bg-danger text-light my-2">{{ $error }}</div>
@endforeach
    </div>


<script>
let error = document.querySelector('#errors');
setTimeout(function(){
    error.classList.remove('slideUp');
    error.classList.add('disapear');
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
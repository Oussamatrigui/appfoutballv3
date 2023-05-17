<div class="share-button sharer" style="display: block;">
    <button type="button" class="btn btn-success share-btn"><i class="far fa-share-square"></i></button>
    <div class="social top center networks-5 ">
        <!-- Facebook Share Button -->
            <a class="fab fa-facebook-f" href="https://www.facebook.com/sharer/sharer.php?u=url"><i class="fa fa-facebook"></i></a> 
        <!-- Google Plus Share Button -->
            <a class="fab fa-youtube" href="{{url('/news/'.$news->id)}}">
                <i class="fa fa-google-plus"></i>
            </a> 
        <!-- Twitter Share Button -->
            <a class="fab fa-twitter" href="https://twitter.com/intent/tweet?text=title&amp;url=url&amp;via=creativedevs"><i class="fa fa-twitter"></i></a> 
        <!-- Pinterest Share Button -->
            <a class="fab fa-instagram" href="https://pinterest.com/pin/create/button/?url=url&amp;description=data&amp;media=image"><i class="fa fa-pinterest"></i></a>
    
        <!-- LinkedIn Share Button -->
            <a class="fab fa-linkedin-in" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=url&amp;title=title&amp;source=url/"><i class="fa fa-linkedin"></i></a>
   
    </div>
</div>
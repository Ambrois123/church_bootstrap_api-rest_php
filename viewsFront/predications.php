<?php
ob_start();
?>
<section>
  <div class="carousel-inner h-50">
    <div class="carousel-item active" >
      <img src="images/Bible_reduite2.jpg" class="d-block w-100" alt="...">     
    </div>
  </div>
</section>
<section class="py-5 general_font bg-secondary">
  <div class="mx-5" 
  style="border: 1px solid lightgrey;
  box-shadow: 1px 1px 3px rgba(255, 255, 255, 0.54);">
        <h1 class="text-center title-font p-3 banner-text ">
              La loi de l'Eternel est parfaite, elle restaure l'âme; 
              Le témoignage de l'Eternel est véritable, il rend sage l'ignorant.
        </h1>
  </div>
      <div class="container">
        <div class="row py-4 g-1">
        <?php foreach($sermons as $sermon):?>
          <div class="col-md-4">
          
            <div class="card rounded-0" style="box-shadow: 3px 4px 5px 0px rgba(0,0,0,0.75);">
              <div class="card-body">
                <h6 class="card-title">Titre : <?= $sermon->getTitle()?></h6>
                <p class="card-text">Thème : <?= $sermon->getTheme() ?></p>
                <p class="card-text">Date : <?= $sermon->getDate() ?></p>
                <p class="card-text">Résumé : <?= $sermon->getResume() ?></p>
                <p class="card-text">Orateur : <?= $sermon->getAuthor() ?></p>                
                <div class="">
                  <input type="range" class='progressBar' min="0" value="0" 
                  style="
                  width: 100%; height: 1.2px;
                  background: black;
                  position: relative;
                  width: 100%;
                  height: 1.2px;
                  outline: none;
                  ">
                  <span id="elapsed" style="font-size: 12px;">0:00</span> / <span id="track-time" style="font-size: 12px;">0:00</span>
                  <div class="">
                    <!-- <audio controls src="public/sermons/<?=$sermon->getAudio(); ?>"></audio> -->
                    <audio class="audio" 
                        src="public/sermons/<?=$sermon->getAudio(); ?>" 
                        type="audio/mpeg"  
                        style="width: 100%;">
                    </audio>
                    <i class="fa-sharp fa-regular fa-circle-play fa-xl play-btn"></i>
                    <i class="fa-regular fa-circle-pause fa-xl pause-btn" style="display: none;"></i>
                    <i class="fa-regular fa-circle-stop fa-xl stop-btn" style="display: none;"></i>
                  </div>
                  <div class="">
                    <!-- <input type="range" id="volume" min="0" max="1" step="0.1"> -->
                    <!-- <span id="volume-value">100%</span> -->
                  </div>
                </div>
              </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          
        </div>
      </div>
      <script>
        let audio = document.querySelector('audio');
        let playBtn = document.querySelector('.play-btn');
        let pauseBtn = document.querySelector('.pause-btn');
        let stopBtn = document.querySelector('.stop-btn');
        let progressBar = document.querySelector('.progressBar');
        let elapsed = document.querySelector('#elapsed');
        let trackTime = document.querySelector('#track-time');
        

        //Récupérer la durée du fichier audio
        audio.addEventListener('loadedmetadata', function(){
          let minutes = parseInt(audio.duration / 60, 10);
          let seconds = parseInt(audio.duration % 60);
          trackTime.textContent = `${minutes}:${seconds}`;
          console.log(minutes, seconds);

        //Gestion play button
        playBtn.addEventListener('click', function(){
          audio.play();
          playBtn.style.display = 'none';
          pauseBtn.style.display = 'inline-block';
          stopBtn.style.display = 'inline-block';
        });

        //Gestion pause button
        pauseBtn.addEventListener('click', function(){
          audio.pause();
          playBtn.style.display = 'inline-block';
          pauseBtn.style.display = 'none';
          stopBtn.style.display = 'inline-block';
        });

        //Gestion stop button
        stopBtn.addEventListener('click', function(){
          audio.pause();
          audio.currentTime = 0;
          playBtn.style.display = 'inline-block';
          pauseBtn.style.display = 'none';
          stopBtn.style.display = 'none';
        });

        //Gestion de la barre de progression
        audio.addEventListener('timeupdate', function(){
          let position = audio.currentTime / audio.duration;
          progressBar.value = position * 100;
          let minutes = parseInt(audio.currentTime / 60, 10);
          let seconds = parseInt(audio.currentTime % 60);
          elapsed.textContent = `${minutes}:${seconds}`;
        });

        //Déplacement de la barre de progression
        progressBar.addEventListener('change', function(){
          audio.currentTime = progressBar.value * audio.duration / 100;
        });

        });
      </script>
    </section>

<?php
$content= ob_get_clean();

require_once 'template.php';
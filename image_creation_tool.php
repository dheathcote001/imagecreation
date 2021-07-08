<?php
global $wpdb;
$template_categaries = $wpdb->get_results("SELECT * from wp_ck_template_category WHERE status = 0");
?>
<style>
  .progress {
    display: -ms-flexbox;
    display: flex;
    height: 20px;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
  margin-top: 10px;
}
.progress-bar {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-pack: center;
    justify-content: center;
    overflow: hidden;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    background-color: #28a745;
    transition: width .6s ease;
  font-size: 16px;
  text-align: center;
}

#uploadStatus{
  padding: 10px 20px;
    margin-top: 10px;
  font-size:18px;
  text-align: center;
}
.downloadedImage {
    position: absolute;
    bottom: 0;
    text-align: center;
    width: 100%;
    font-size: 25px;
    font-weight: bold;
    color: #fff;
}
.loader {
    background-size: calc(100% - 30px);
    background-repeat: no-repeat;
    background-position: center top;
}
</style>
<!-- <div class="images_upload-progress">
  <div class="progress">
  </div>
</div> -->
<!-- multistep form -->
<form id="msform" method="post" sdfsdfsdf>
  <input type="hidden" name="action" value="download_artwork">
  <div class="stepper-progress">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Setp 1</li>
      <li>Setp 2</li>
      <!-- <li>Setp 3</li> -->
    </ul>
  </div>
  <!-- fieldsets -->
  <fieldset class="breed-category step-section-1 Two1">
    <h2 class="fs-title">Please select size, frame and images below and press next.</h2>
    <div class="row pt-5">

      <div class="col-md-6">

        <div class="select-box mb-4">
          <h3 class="fs-subtitle">Select the frame size</h3>
          <select class="form-select frame_size" aria-label="Default select example" name="frame_size">
            <option selected>Select the frame size</option>
            <option value="8x10">8x10</option>
            <option value="10x8">10x8</option>
            <option value="11x14">11x14</option>
            <option value="14x11">14x11</option>
          </select>
        </div>

      </div>
      <div class="col-md-6">

        <div class="select-box">
          <h3 class="fs-subtitle">Select number of frames</h3>
          <select class="form-select number_of_frames" aria-label="Default select example" name="number_of_frames">
            <option selected>Select number of frames</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <!-- <option value="Hand Image">Hand Image</option>
            <option value="Measurement">Measurement</option>
            <option value="Mailer">Mailer</option> -->
          </select>
        </div>

      </div>

    </div>

    <div class="row pt-2">
      <div class="col-12">
        <div class="img-upload-box card mx-auto shadow-sm py-5">
          <h3 class="fs-subtitle text-center">Image upload option</h3>
          <!-- <p class="title-info">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> -->

          <div class="drag-area shadow-sm position-relative">
            <div class="drag-area-inner">
              <div class="icon">
                <div class="upload-btn">
                  <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M43.0835 25.4584C42.5641 25.4584 42.066 25.6647 41.6987 26.032C41.3315 26.3992 41.1252 26.8973 41.1252 27.4167V35.6672C41.1236 37.1142 40.5481 38.5015 39.5249 39.5247C38.5017 40.548 37.1143 41.1235 35.6673 41.125H11.333C9.886 41.1235 8.49867 40.548 7.47546 39.5247C6.45224 38.5015 5.87672 37.1142 5.87516 35.6672V27.4167C5.87516 26.8973 5.66884 26.3992 5.30158 26.032C4.93432 25.6647 4.43621 25.4584 3.91683 25.4584C3.39745 25.4584 2.89934 25.6647 2.53208 26.032C2.16482 26.3992 1.9585 26.8973 1.9585 27.4167V35.6672C1.96109 38.1526 2.94959 40.5356 4.7071 42.2931C6.46461 44.0506 8.84755 45.0391 11.333 45.0417H35.6673C38.1528 45.0391 40.5357 44.0506 42.2932 42.2931C44.0507 40.5356 45.0392 38.1526 45.0418 35.6672V27.4167C45.0418 26.8973 44.8355 26.3992 44.4683 26.032C44.101 25.6647 43.6029 25.4584 43.0835 25.4584Z" fill="#F37F5F"/>
                    <path d="M13.1345 17.0512L21.5416 8.64407V33.2917C21.5416 33.811 21.7479 34.3092 22.1152 34.6764C22.4825 35.0437 22.9806 35.25 23.4999 35.25C24.0193 35.25 24.5174 35.0437 24.8847 34.6764C25.252 34.3092 25.4583 33.811 25.4583 33.2917V8.64407L33.8654 17.0512C34.2347 17.4079 34.7294 17.6053 35.2429 17.6009C35.7564 17.5964 36.2475 17.3904 36.6106 17.0273C36.9737 16.6643 37.1797 16.1731 37.1841 15.6596C37.1886 15.1461 36.9912 14.6515 36.6345 14.2821L24.8845 2.53211C24.5172 2.16498 24.0192 1.95874 23.4999 1.95874C22.9807 1.95874 22.4826 2.16498 22.1154 2.53211L10.3654 14.2821C10.0087 14.6515 9.81129 15.1461 9.81575 15.6596C9.82021 16.1731 10.0262 16.6643 10.3893 17.0273C10.7523 17.3904 11.2435 17.5964 11.757 17.6009C12.2705 17.6053 12.7651 17.4079 13.1345 17.0512Z" fill="#F37F5F"/>
                  </svg>
                  <input type="file" name="images[]" multiple id="gallery-photo-add">
                </div>
                <header>Choose a file</header>
              </div>
            </div>

          </div>


          <div class="gallery d-flex align-items-center flex-wrap justify-content-center pt-4" id="galleryID"></div>

        </div>
      </div>
    </div>

    <div class="setpper-button mt-3">
      <input type="button" name="next" class="next action-button first-step-button" value="Next" />
    </div>
  </fieldset>



  <fieldset class="step-section-2 container-md">
    <h2 class="fs-title">Please select image templates below</h2>


    <!-- Tabs -->
    <section id="tabs" class="mt-5">
      <div class="container-md">
        <div class="row">
          <div class="col-12 ">

            <nav>
              <div class="nav nav-tabs tab-custom" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Main Images</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">A+ Content: Top Image</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">A+ Content: Big Image</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-others" type="button" role="tab" aria-controls="nav-others" aria-selected="false">Others</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <div class="accordion mt-5 custom-accordion" id="accordionExample">

                  <?php
                  if(!empty($template_categaries)){
                    $i = 0;
                    foreach ($template_categaries as $template_categary_key => $template_categary_value) {
                      ?>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $template_categary_value->id; ?>">
                          <button class="accordion-button <?php echo ($i == 0) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $template_categary_value->id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $template_categary_value->id; ?>">
                            <?php echo $template_categary_value->category_name; ?>
                          </button>
                        </h2>
                        <div id="collapse<?php echo $template_categary_value->id; ?>" class="accordion-collapse collapse T_ID_<?php echo $template_categary_value->id; ?>_1 <?php echo ($i == 0) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $template_categary_value->id; ?>" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <div class="row mt-3">
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      $i++;
                    }
                  }
                  ?>
                </div>


              </div>

              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                <div class="accordion mt-5 custom-accordion" id="accordionExample2">

                  <?php
                  if(!empty($template_categaries)){
                    $i = 0;
                    foreach ($template_categaries as $template_categary_key => $template_categary_value) {
                      ?>

                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne<?php echo $template_categary_value->id; ?>">
                          <button class="accordion-button <?php echo ($i == 0) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $template_categary_value->id; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $template_categary_value->id; ?>">
                            <?php echo $template_categary_value->category_name; ?>
                          </button>
                        </h2>
                        <div id="collapseOne<?php echo $template_categary_value->id; ?>" class="accordion-collapse collapse T_ID_<?php echo $template_categary_value->id; ?>_2 <?php echo ($i == 0) ? 'show' : ''; ?>" aria-labelledby="headingOne<?php echo $template_categary_value->id; ?>" data-bs-parent="#accordionExample2">
                          <div class="accordion-body">
                            <div class="row mt-3">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      $i++;
                    }
                  }
                  ?>
                </div>

              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="accordion mt-5 custom-accordion" id="accordionExample3">
                  
                  <?php
                  if(!empty($template_categaries)){
                    $i = 0;
                    foreach ($template_categaries as $template_categary_key => $template_categary_value) {
                      ?>

                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne2">
                          <button class="accordion-button <?php echo ($i == 0) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $template_categary_value->id; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $template_categary_value->id; ?>">
                            <?php echo $template_categary_value->category_name; ?>
                          </button>
                        </h2>
                        <div id="collapseOne<?php echo $template_categary_value->id; ?>" class="accordion-collapse collapse T_ID_<?php echo $template_categary_value->id; ?>_3 <?php echo ($i == 0) ? 'show' : ''; ?>" aria-labelledby="headingOne<?php echo $template_categary_value->id; ?>" data-bs-parent="#accordionExample3">
                          <div class="accordion-body">
                            <div class="row mt-3">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      $i++;
                    }
                  }
                  ?>
                </div>

              </div>

              <div class="tab-pane fade" id="nav-others" role="tabpanel" aria-labelledby="nav-others-tab">
                <div class="accordion mt-5 custom-accordion" id="accordionExample4">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne2">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneOthers" aria-expanded="true" aria-controls="collapseOneOthers">
                        
                      </button>
                    </h2>
                    <div id="collapseOneOthers" class="accordion-collapse collapse all-others show" aria-labelledby="headingOneOthers" data-bs-parent="#accordionExample4">
                      <div class="accordion-body">
                        <div class="row mt-3">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>



          </div>
        </div>
      </div>
    </section>
    <!-- ./Tabs -->

    <div class="setpper-button mt-3">
      <input type="button" name="previous" class="previous action-button" value="Back" />
      <!-- <input type="button" name="next" class="next action-button" value="Next"  /> -->
    </div>
  </fieldset>



  <!-- <fieldset class="step-section-3 container-md">
  <div class="setpper-button">
  <input type="button" name="previous" class="previous action-button" value="Back" />
  <input type="submit" name="submit" class="submit action-button" value="Finish" />
</div>
</fieldset> -->
<div class="cropperModal">
  <div class="cropperContainer">
  <div class="img-container">
    <img id="imageCrop" src="">
  </div>
  <div class="controls">
    <!-- CONTROLS -->
    <div class="buttons">
      <div class="btn btn-rotate">
        <span class="svgIcon">
          <svg aria-hidden="false" aria-label="rotate right Icon" width="20px" fill="#545F7E" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>rotate_right</title><path d="M21.76 11.69L23 7.11a.62.62 0 0 0-.91-.7l-2.2 1.28a9.94 9.94 0 1 0-9 14.31 9.8 9.8 0 0 0 4.76-1.23 1.26 1.26 0 0 0 .24-2 1.24 1.24 0 0 0-1.46-.21 7.34 7.34 0 0 1-5.57.63 7.27 7.27 0 0 1-5.25-5.63A7.44 7.44 0 0 1 17.7 9l-2.15 1.2a.63.63 0 0 0 .15 1.15l4.54 1.22a1.24 1.24 0 0 0 1.52-.88z"></path></svg>
        </span>
        Rotate
      </div>
      <div class="btn fit-btn">
        <span class="svgIcon">
          <svg aria-hidden="false" aria-label="fit Icon" width="20px" fill="#545F7E" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>fit</title><path d="M19.78 5.5a.75.75 0 0 1 .72.79v11.42a.75.75 0 0 1-.72.79H4.22a.75.75 0 0 1-.72-.79V6.29a.75.75 0 0 1 .72-.79h15.56m0-1.5H4.22A2.25 2.25 0 0 0 2 6.29v11.42A2.25 2.25 0 0 0 4.22 20h15.56A2.25 2.25 0 0 0 22 17.71V6.29A2.25 2.25 0 0 0 19.78 4z"></path><path d="M6 14.61l1.33-2a.54.54 0 0 1 .91 0l2.4 3.55 3.76-5.58a.54.54 0 0 1 .91 0l2.69 4V4H6zM6 17.12h12V20H6z"></path><path d="M6 9.83h1v9.79H6zM17 9.83h1v9.79h-1z"></path></svg>
        </span>
        FIT
      </div>
      <div class="btn fill-btn">
        <span class="svgIcon">
          <svg aria-hidden="false" aria-label="gallery Icon" width="20px" fill="#545F7E" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>gallery</title><path d="M19.78 4H4.22A2.25 2.25 0 0 0 2 6.29v11.42A2.25 2.25 0 0 0 4.22 20h15.56A2.25 2.25 0 0 0 22 17.71V6.29A2.25 2.25 0 0 0 19.78 4zm-1.15 13.12H5.37a.57.57 0 0 1-.46-.89l2.42-3.58a.54.54 0 0 1 .91 0l2.4 3.55 3.76-5.58a.54.54 0 0 1 .91 0l3.78 5.61a.57.57 0 0 1-.46.89z"></path></svg>
        </span>
        FILL
      </div>
    </div>
    <div class="zoomControl">
      <div class="zoomOut" data-type="zoomOut" data-control>
        <div class="icon">
          <svg aria-hidden="false" aria-label="minus Icon" width="18px" fill="#7683A8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>minus</title><path d="M22 12a1.43 1.43 0 0 1-1.42 1.42l-17.16-.05a1.42 1.42 0 0 1 0-2.84l17.16.05A1.43 1.43 0 0 1 22 12z"></path></svg>
        </div>
      </div>
      <div class="zoomingRabge">
        <div class="range-slider">
          <input class="range-slider__range" type="range" value="0.10" min="0.10" max="1" step="0.05">
          <span class="range-slider__value">0</span>
        </div>
      </div>
      <div class="zoomIn" data-type="zoomIn" data-control>
        <svg aria-hidden="false" aria-label="add Icon" width="18px" fill="#7683A8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 12a1.43 1.43 0 0 1-1.42 1.42l-7.18-.05v7.21a1.46 1.46 0 0 1-2.48 1 1.42 1.42 0 0 1-.42-1l.05-7.16H3.42a1.42 1.42 0 0 1 0-2.84h7.13V3.42a1.43 1.43 0 0 1 2.85 0v7.11l7.18.05A1.43 1.43 0 0 1 22 12z"></path></svg>
      </div>
    </div>
  </div>
</div>
<div class="cropperFooter">
  <div class="leftAlign">
    <div class="replaceImg">
      <label for="replaceImage">
        <span class="icon">
          <svg aria-hidden="false" aria-label="refresh Icon" width="24px" fill="#387DFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>refresh</title><path d="M4 16.75L2 18a.55.55 0 0 1-.74 0 .6.6 0 0 1-.13-.75l1.14-4.3a1.19 1.19 0 0 1 .54-.72 1.11 1.11 0 0 1 .87-.12l4.19 1.18a.57.57 0 0 1 .42.49.6.6 0 0 1-.28.59L6 15.51a6.85 6.85 0 0 0 6.86 4.13 7 7 0 0 0 6.06-5.31.58.58 0 0 1 .55-.46h1.14a.55.55 0 0 1 .44.21.57.57 0 0 1 .13.47 9.26 9.26 0 0 1-7.82 7.38A9.1 9.1 0 0 1 4 16.75zm16-9.5l2.05-1.2a.55.55 0 0 1 .74 0 .6.6 0 0 1 .13.75l-1.14 4.3a1.19 1.19 0 0 1-.54.72 1.11 1.11 0 0 1-.87.12l-4.19-1.18a.57.57 0 0 1-.42-.49.6.6 0 0 1 .24-.6l2-1.18a6.85 6.85 0 0 0-6.86-4.13A7 7 0 0 0 5.1 9.67a.58.58 0 0 1-.55.46H3.41A.55.55 0 0 1 3 9.92a.57.57 0 0 1-.13-.47 9.26 9.26 0 0 1 7.82-7.38A9.1 9.1 0 0 1 20 7.25z"></path></svg>
        </span>
      
      <input type="file" name="replaceImage" id="replaceImage">
      Replace Image
      </label>
    </div>
  </div>
  <div class="right-align">
    <div class="closeCropper btn">Cancel</div>
    <div class="applyCrop btn">Apply</div>
  </div>
</div>
</div>
<div class="container-md position-relative">
  <div class="download-btn">
    <a class="form-btn-style download" href="#" role="button"><i class="fas fa-download"></i> Download All</a>

  </div>
</div>


</form>



<canvas id="canvas">
  Sorry. Your browser does not support HTML5 canvas element.
</canvas>

<style type="text/css">
.inner-images{
  position: absolute;
  background-color: transparent;
}
.inner-images img {
  max-width: 100%;
  max-height: 100%;
  /*object-fit: cover;*/
}
#canvas{
  display: none;
}
</style>

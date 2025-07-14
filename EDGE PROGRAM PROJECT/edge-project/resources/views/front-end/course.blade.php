<!-- resources/views/front-end/course.blade.php -->

<section class="our-courses" id="courses" style="padding-top: 0;">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-heading">
                  <h2>Our Popular Courses</h2>
              </div>
          </div>
          <div class="col-lg-12">
              <div class="owl-courses-item owl-carousel">
                  <!-- Loop through courses -->
                  @foreach($courses as $course)
                      <div class="item">
                          <!-- Add class "course-image" to each image tag for targeting -->
                          <img class="course-image" src="assets/images/course-01.jpg" alt="Course Image"> <!-- Default image -->
                          <div class="down-content">
                              <h4>{{ $course->name }}</h4> <!-- Display dynamic course name -->
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</section>

<!-- Add the JavaScript function to change the image -->
<script>
  // List of image paths to choose from
  const images = [
      'assets/images/course-01.jpg', // First image
      'assets/images/course-02.jpg', // Second image
      'assets/images/course-03.jpg', // Third image
      'assets/images/course-04.jpg', // Fourth image
  ];

  // Function to randomly assign an image to each course item
  function changeCourseImages() {
      const courseImages = document.querySelectorAll('.course-image'); // Get all images with the class "course-image"
      
      courseImages.forEach(image => {
          // Randomly pick an image from the images array
          const randomImage = images[Math.floor(Math.random() * images.length)];
          image.src = randomImage; // Set the new random image source
      });
  }

  // Run the function when the page is loaded
  document.addEventListener('DOMContentLoaded', function() {
      changeCourseImages(); // Change the images for courses
  });
</script>

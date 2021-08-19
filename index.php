<!DOCTYPE html>
<html lang="en-US">
  <head>
    <!-- Meta setup -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="keywords" content="" />
    <meta name="decription" content="" />
    <meta name="designer" content="Anuforo Okechukwu" />

    <!-- Title -->
    <title>Welcome to FreeEdx</title>

    <!-- style-css -->
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800"
      rel="stylesheet"
    />
    <script src="js/index.js"></script>
  </head>
  <body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!--- header-area start-->
    <header>
      <div class="opacity-outer"></div>

      <div class="video-main-outer">
        <div class="auto-container">
          <div class="logo-outer">
            <div class="logo">
				<a href="#">
					<img src="image/logo.jpg" alt="logo" />
				</a>
			</div>
            <div class="logo__text">
				<h2>GradSmartly</h2>
				<p>Graduate Smartly!</p>
			</div>
          </div>
          <section class="header-content-outer">
          <h2 class='heading'>Free Education in Germany</h2>
            <div class="header__content">
              <div class="header-content-rightbar">
                <h2>Choose the best and save for real</h2>
                <p class="item-a1">
                  Lorem Ipsum has been the industry's standard </p>
                <form onsubmit="return false">
                  <div class="form__name">
                    <input
                      name="first"
                      type="text"
                      id="First"
                      class="name-field fname"
                      placeholder="First Name"
                    />
                    <input
                      name="last"
                      type="text"
                      id="Last"
                      class="name-field fname"
                      placeholder="Last Name"
                    />
                  </div>
                  <input
                    name="email"
                    type="email"
                    id="Email"
                    class="name-field"
                    placeholder="Email Address"
                  />
                  <input
                    name="phone"
                    type="tel"
                    id="Phone"
                    onkeyup="NumbersOnly(this.id)"
                    class="name-field"
                    placeholder="Phone Number"
                  />
                  <button
                    class="message-send"
                    id="submit"
                    onClick="validate()"
                  />SEND US A MESSAGE</button>
                </form>
              </div>
              <div class="header-content-leftbar">
                <iframe
                  src="https://www.youtube.com/embed/sfcc7-4KeFo"
                  frameborder="0"
                  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                >
                </iframe>
				
              </div>
            </div>
          </section>
          <div class="footer-area">
            <p class="item-a1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate deleniti, eos, sequi quisquam corrupti veritatis illo quasi dicta dolore sunt mollitia accusamus quia doloremque! Ipsam tempora neque dolores recusandae quisquam, debitis?</p>
            <p class="item-a1">&copy; FreeEdx. All Rights Reserved &reg;</p>
          </div>
        </div>
      </div>
      <video class="video-bg" autoplay muted loop>
        <source src="video/People Staying Indoors.mp4" type="video/mp4" />
        <source src="video/People Staying Indoors.mp4" type="video/webm" />
      </video>
    </header>
    <!--- header-area end-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>

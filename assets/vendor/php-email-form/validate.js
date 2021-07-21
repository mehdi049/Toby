(function () {
  "use strict";

  /** application form  */

  let applicationForms = document.querySelectorAll(".send-application-form");

  applicationForms.forEach(function (e) {
    e.addEventListener("submit", function (event) {
      event.preventDefault();

      let thisForm = this;

      let action = thisForm.getAttribute("action");

      if (!action) {
        displayApplicationError(
          thisForm,
          "The form action property is not set!"
        );
        return;
      }
      thisForm.querySelector(".application-loading").classList.add("d-block");
      thisForm
        .querySelector(".application-error-message")
        .classList.remove("d-block");
      thisForm
        .querySelector(".application-sent-message")
        .classList.remove("d-block");

      let formData = new FormData(thisForm);
      application_submit(thisForm, action, formData);
    });
  });

  function application_submit(thisForm, action, formData) {
    fetch(action, {
      method: "POST",
      body: formData,
      headers: { "X-Requested-With": "XMLHttpRequest" },
    })
      .then((response) => {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error(
            `${response.status} ${response.statusText} ${response.url}`
          );
        }
      })
      .then((data) => {
        thisForm
          .querySelector(".application-loading")
          .classList.remove("d-block");
        if (data.trim() == "OK") {
          thisForm
            .querySelector(".application-sent-message")
            .classList.add("d-block");
          thisForm.reset();
        } else {
          throw new Error(
            data
              ? data
              : "Form submission failed and no error message returned from: " +
                action
          );
        }
      })
      .catch((error) => {
        displayApplicationError(thisForm, error);
      });
  }

  function displayApplicationError(thisForm, error) {
    console.log(error);
    thisForm.querySelector(".application-loading").classList.remove("d-block");
    thisForm.querySelector(".application-error-message").innerHTML = error;
    thisForm
      .querySelector(".application-error-message")
      .classList.add("d-block");
  }

  /** contact form  */

  let contactForms = document.querySelectorAll(".contact-form");

  contactForms.forEach(function (e) {
    e.addEventListener("submit", function (event) {
      event.preventDefault();

      /* let valid = true;
      $(".contact-form input,.contact-form textarea").each(function () {
        $(this).removeClass("invalid-input");
        let value = $(this).val();
        if (value.length == 0) {
          valid = false;
          $(this).addClass("invalid-input");
        }
      });

      if (valid) {*/
      let thisForm = this;

      let action = thisForm.getAttribute("action");

      if (!action) {
        displayContactError(thisForm, "The form action property is not set!");
        return;
      }
      thisForm.querySelector(".contact-loading").classList.add("d-block");
      thisForm
        .querySelector(".contact-error-message")
        .classList.remove("d-block");
      thisForm
        .querySelector(".contact-sent-message")
        .classList.remove("d-block");

      let formData = new FormData(thisForm);
      contact_submit(thisForm, action, formData);
      //  }
    });
  });

  function contact_submit(thisForm, action, formData) {
    fetch(action, {
      method: "POST",
      body: formData,
      headers: { "X-Requested-With": "XMLHttpRequest" },
    })
      .then((response) => {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error(
            `${response.status} ${response.statusText} ${response.url}`
          );
        }
      })
      .then((data) => {
        thisForm.querySelector(".contact-loading").classList.remove("d-block");
        if (data.trim() == "OK") {
          thisForm
            .querySelector(".contact-sent-message")
            .classList.add("d-block");
          thisForm.reset();
        } else {
          throw new Error(
            data
              ? data
              : "Form submission failed and no error message returned from: " +
                action
          );
        }
      })
      .catch((error) => {
        displayContactError(thisForm, error);
      });
  }

  function displayContactError(thisForm, error) {
    console.log(error);
    thisForm.querySelector(".contact-loading").classList.remove("d-block");
    thisForm.querySelector(".contact-error-message").innerHTML = error;
    thisForm.querySelector(".contact-error-message").classList.add("d-block");
  }
})();

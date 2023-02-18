/*===============================================

Theme Name:Freelife  Admin Template
Version:1.0
Author: ITCLAN
Support: itclan@gmail.com
Description: Freelife  Admin Template

NOTE:
=====
Please DO NOT EDIT THIS JS, you may need to use "custom.js".

===============================================**/

(function ($) {
  ("use strict");

  $('#demo').steps({
    onFinish: function () {
      alert('Wizard Completed');
    }
  });

  $('.new__board').on('click', function () {
    $('.step-tab-panel').removeClass('active');
    $('[data-step="step1"]').addClass('active');
    $('[data-step-target="step1"]').addClass('active');
    $('[data-step-target="step1"]').removeClass('done');
    $('[data-step-action="prev"]').css({
      'display': 'none'
    });
    $('[data-step-action="next"]').css({
      'display': 'block'
    });
  });

  // $("#sortable1, #sortable2, #sortable3, #sortable4").sortable({
  //   connectWith: ".connectedSortable"
  // }).disableSelection();

  // target elements with the "draggable" class
  interact('.draggable')
    .draggable({
      // enable inertial throwing
      inertia: true,
      // keep the element within the area of it's parent
      modifiers: [
        interact.modifiers.restrictRect({
          restriction: '.ic__four--box',
          endOnly: true
        })
      ],
      // enable autoScroll
      autoScroll: true,

      listeners: {
        // call this function on every dragmove event
        move: dragMoveListener,

        // call this function on every dragend event
        end(event) {
          var textEl = event.target.querySelector('span')

          textEl && (textEl.textContent =
            'moved a distance of ' +
            (Math.sqrt(Math.pow(event.pageX - event.x0, 2) +
              Math.pow(event.pageY - event.y0, 2) | 0))
            .toFixed(2) + 'px')
        }
      }
    })

  function dragMoveListener(event) {
    var target = event.target
    // keep the dragged position in the data-x/data-y attributes
    var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
    var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

    // translate the element
    target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'

    // update the posiion attributes
    target.setAttribute('data-x', x)
    target.setAttribute('data-y', y)
  }

  // this function is used later in the resizing and gesture demos
  window.dragMoveListener = dragMoveListener


  /*
   * Convert HTML content to PDF
   */
  // $(document).on('click', '.ic__download-pdf', function () {
  //   console.log('test');
  //   var doc = new jsPDF();

  //   // Source HTMLElement or a string containing HTML.
  //   var elementHTML = document.querySelector("#contentToPrint");
  //   doc.fromHTML(elementHTML, {
  //     callback: function (doc) {
  //       // Save the PDF
  //       doc.save('document-html.pdf');
  //     },
  //     margin: [10, 10, 10, 10],
  //     autoPaging: 'text',
  //     x: 0,
  //     y: 0,
  //     width: 190, // Target width in the PDF document
  //     windowWidth: 675 // Window width in CSS pixels
  //   });
  // });


  /**Jquery End **/
})(jQuery);
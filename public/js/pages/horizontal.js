/**
 *
 * VerticalPage
 *
 * Vertical page content scripts. Initialized from scripts.js file.
 *
 *
 */

class VerticalPage {
  constructor() {
    // Page js
  }

  _addNewEvent() {
    this._clearForm();
    this.currentEventId = null;
    this._enableAdd();
    document.getElementById('modalTitle').innerHTML = 'Add Event';
    this.newEventModal.show();
  }
}

/**
 *
 * Scripts
 *
 * Initialization of the template base and page scripts.
 *
 *
 */

 class Scripts {
  constructor() {
    this._initSettings();
    this._initVariables();
    this._addListeners();
    this._init();
  }

  // Showing the template after waiting for a bit so that the css variables are all set
  // Initialization of the common scripts and page specific ones
  _init() {
    setTimeout(() => {
      document.documentElement.setAttribute('data-show', 'true');
      document.body.classList.remove('spinner');
      this._initBase();
      this._initCommon();
      this._initPages();
    }, 100);
  }

  // Base scripts initialization
  _initBase() {
    // Navigation
    if (typeof Nav !== 'undefined') {
      const nav = new Nav(document.getElementById('nav'));
    }

    // Search implementation
    if (typeof Search !== 'undefined') {
      const search = new Search();
    }

    // AcornIcons initialization
    if (typeof AcornIcons !== 'undefined') {
      new AcornIcons().replace();
    }
  }

  // Common plugins and overrides initialization
  _initCommon() {
    // common.js initialization
    if (typeof Common !== 'undefined') {
      let common = new Common();
    }
  }

  _initPages() {
    // horizontal.js initialization
    if (typeof HorizontalPage !== 'undefined') {
      const horizontalPage = new HorizontalPage();
    }

    // vertical.js initialization
    if (typeof VerticalPage !== 'undefined') {
      const verticalPage = new VerticalPage();
    }
  }

  // Plugin pages initialization
  _initPlugins() {
    // carousels.js initialization
    if (typeof Carousels !== 'undefined') {
      const carousels = new Carousels();
    }
    // charts.js initialization
    if (typeof Charts !== 'undefined') {
      const charts = new Charts();
    }
    // contextmenu.js initialization
    if (typeof ContextMenu !== 'undefined') {
      const contextMenu = new ContextMenu();
    }
    // lightbox.js initialization
    if (typeof Lightbox !== 'undefined') {
      const lightbox = new Lightbox();
    }

    // lists.js initialization
    if (typeof Lists !== 'undefined') {
      const lists = new Lists();
    }
    // notifies.js initialization
    if (typeof Notifies !== 'undefined') {
      const notifies = new Notifies();
    }
    // players.js initialization
    if (typeof Players !== 'undefined') {
      const players = new Players();
    }
    // progressbars.js initialization
    if (typeof ProgressBars !== 'undefined') {
      const progressBars = new ProgressBars();
    }
    // shortcuts.js initialization
    if (typeof Shortcuts !== 'undefined') {
      const shortcuts = new Shortcuts();
    }
    // sortables.js initialization
    if (typeof Sortables !== 'undefined') {
      const sortables = new Sortables();
    }
    // datatable.editablerows.js initialization
    if (typeof EditableRows !== 'undefined') {
      const editableRows = new EditableRows();
    }
    // datatable.editableboxed.js initialization
    if (typeof EditableBoxed !== 'undefined') {
      const editableBoxed = new EditableBoxed();
    }
    // datatable.ajax.js initialization
    if (typeof RowsAjax !== 'undefined') {
      const rowsAjax = new RowsAjax();
    }
    // datatable.serverside.js initialization
    if (typeof RowsServerSide !== 'undefined') {
      const rowsServerSide = new RowsServerSide();
    }
    // datatable.serverside.js initialization
    if (typeof BoxedVariations !== 'undefined') {
      const boxedVariations = new BoxedVariations();
    }
  }

  // Settings initialization
  _initSettings() {
    if (typeof Settings !== 'undefined') {
      const settings = new Settings({attributes: {placement: 'horizontal', color: 'light-blue' }, showSettings: true, storagePrefix: 'acorn-starter-project-'});
    }
  }

  // Variables initialization of Globals.js file which contains valus from css
  _initVariables() {
    if (typeof Variables !== 'undefined') {
      const variables = new Variables();
    }
  }

  // Listeners of menu and layout changes which fires a resize event
  _addListeners() {
    document.documentElement.addEventListener(Globals.menuPlacementChange, (event) => {
      setTimeout(() => {
        window.dispatchEvent(new Event('resize'));
      }, 25);
    });

    document.documentElement.addEventListener(Globals.layoutChange, (event) => {
      setTimeout(() => {
        window.dispatchEvent(new Event('resize'));
      }, 25);
    });

    document.documentElement.addEventListener(Globals.menuBehaviourChange, (event) => {
      setTimeout(() => {
        window.dispatchEvent(new Event('resize'));
      }, 25);
    });
  }
}

// Shows the template after initialization of the settings, nav, variables and common plugins.
(function () {
  window.addEventListener('DOMContentLoaded', () => {
    // Initializing of the Scripts
    if (typeof Scripts !== 'undefined') {
      const scripts = new Scripts();
    }
  });
})();

// Disabling dropzone auto discover before DOMContentLoaded
(function () {
  if (typeof Dropzone !== 'undefined') {
    Dropzone.autoDiscover = false;
  }
})();

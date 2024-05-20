// Declaring document
const doc = document;

// Sidebar variables
const sidebar = doc.getElementsByClassName("aside-sidebar")[0] as HTMLElement;
const ul = doc.getElementsByClassName("sidebar-tabs")[0] as HTMLElement;
const dashboardTab = ul.getElementsByClassName(
  "dashboard-tab"
)[0] as HTMLElement;
const categoryToggle = ul.getElementsByClassName(
  "category-toggle"
)[0] as HTMLElement;
const productToggle = ul.getElementsByClassName(
  "product-toggle"
)[0] as HTMLElement;
const userToggle = ul.getElementsByClassName("user-toggle")[0] as HTMLElement;
const categoryInner = ul.getElementsByClassName(
  "inner-category"
)[0] as HTMLElement;
const userInner = ul.getElementsByClassName("inner-user")[0] as HTMLElement;

// Adding active class to the clicked sidebar tab
const activeSidebarTab = () => {
  const sidebarTabs = Array.from(
    ul.getElementsByClassName("tabs")
  ) as HTMLElement[];
  let previousAdminTab: HTMLElement | null = null;

  sidebarTabs.forEach((tab) => {
    tab.addEventListener("click", function (event: Event) {
      const currentTab = event.currentTarget as HTMLElement;

      if (!currentTab.classList.contains("active")) {
        // Remove 'active' class from all tabs
        sidebarTabs.forEach((t) => t.classList.remove("active"));
        // Add 'active' class to the clicked tab
        currentTab.classList.add("active");

        // Handle the toggle button rotation for the currently clicked tab
        const currentAdminTab = currentTab.querySelector(
          ".toggle-btn"
        ) as HTMLElement | null;
        if (previousAdminTab && previousAdminTab !== currentAdminTab) {
          previousAdminTab.classList.remove("rotate-180");
        }
        if (currentAdminTab) {
          currentAdminTab.classList.add("rotate-180");
        }
        previousAdminTab = currentAdminTab;

        // Close inner tabs
        if (categoryToggle.classList.contains("flex")) {
          categoryInner.classList.remove("flex");
          categoryInner.classList.add("hidden");
        }
        if (userToggle.classList.contains("flex")) {
          userInner.classList.remove("flex");
          userInner.classList.add("hidden");
        }
      } else {
        // For the tab not toggle
        if (currentTab === productToggle || currentTab === dashboardTab) {
          // Keep productToggle and dashboardTab active, do nothing
          currentTab.classList.add("active");
        } else {
          currentTab.classList.remove("active");
        }

        // Handle the toggle button rotation for the currently clicked tab
        const currentAdminTab = currentTab.querySelector(
          ".toggle-btn"
        ) as HTMLElement | null;
        if (currentAdminTab) {
          currentAdminTab.classList.remove("rotate-180");
        }

        // Reset previousAdminTab as no tab is active now
        previousAdminTab = null;
      }
    });
  });
  // End of adding active classes to the sidebar tabs
};

// Active inner tabs
const activeInnerTabs = () => {
  const innerTabs = Array.from(
    ul.getElementsByClassName("inner-tabs")
  ) as HTMLElement[];
  innerTabs.forEach((tab) => {
    tab.addEventListener("click", (event: Event) => {
      const currentInnerTab = event.currentTarget as HTMLElement;

      // Remove 'active' class from all inner tabs
      innerTabs.forEach((t) => t.classList.remove("active"));
      // Add 'active' class to the clicked inner tab
      currentInnerTab.classList.add("active");
    });
  });
};
// End of active innerTabs

// Appear inner tabs
const appearInnerTabs = () => {
  const innerCategoryAction = () => {
    categoryToggle.addEventListener("click", () => {
      if (categoryToggle.classList.contains("active")) {
        categoryInner.classList.remove("hidden");
        categoryInner.classList.add("flex");
      } else {
        categoryInner.classList.remove("flex");
        categoryInner.classList.add("hidden");
      }
    });
  };
  const innerUserAction = () => {
    userToggle.addEventListener("click", () => {
      if (userToggle.classList.contains("active")) {
        userInner.classList.remove("hidden");
        userInner.classList.add("flex");
      } else {
        userInner.classList.remove("flex");
        userInner.classList.add("hidden");
      }
    });
  };

  innerCategoryAction();
  innerUserAction();
};
// End appear inner tabs

/*
    ----- End of sidebar part -----
    ----- Navbar start -----
*/

// Navbar variables
const mainPart = doc.getElementsByClassName("main-part")[0] as HTMLElement;
const closeSidebarBtn = doc.getElementsByClassName(
  "close-sidebar-toggle"
)[0] as HTMLElement;
const openSidebarBtn = doc.getElementsByClassName(
  "open-sidebar-toggle"
)[0] as HTMLElement;
const toggleSidebar = doc.getElementsByClassName(
  "toggle-sidebar"
)[0] as HTMLElement;
const closeToggleSidebar = doc.getElementsByClassName(
  "x-toggle-sidebar"
)[0] as HTMLElement;
const sunBtn = doc.getElementsByClassName("sun-btn")[0] as HTMLElement;
const moonBtn = doc.getElementsByClassName("moon-btn")[0] as HTMLElement;
const adminImage = doc.getElementsByClassName("admin-image")[0] as HTMLElement;
const profileDropdown = doc.getElementsByClassName(
  "profile-dropdown"
)[0] as HTMLElement;

// Sidebar disappear
const removeSidebar = () => {
  closeSidebarBtn.addEventListener("click", () => {
    // Remove sidebar
    sidebar.classList.remove("lg:block", "md:block");
    sidebar.classList.add("lg:hidden", "md:hidden");

    // Full navbar
    mainPart.classList.remove("lg:w-5/6", "md:w-5/6");
    mainPart.classList.add("lg:w-full", "md:w-full");

    // Hide close toggle
    closeSidebarBtn.classList.remove("lg:block", "md:block");
    closeSidebarBtn.classList.add("lg:hidden", "md:hidden");

    // Add open toggle
    openSidebarBtn.classList.remove("lg:hidden", "md:hidden");
    openSidebarBtn.classList.add("lg:block", "md:block");
  });
};

// Sidebar appear
const addSidebar = () => {
  openSidebarBtn.addEventListener("click", () => {
    // Remove sidebar
    sidebar.classList.remove("lg:hidden", "md:hidden");
    sidebar.classList.add("lg:block", "md:block");

    // Fixed navbar
    mainPart.classList.remove("lg:w-full", "md:w-full");
    mainPart.classList.add("lg:w-5/6", "md:w-5/6");

    // Add close toggle
    closeSidebarBtn.classList.remove("lg:hidden", "md:hidden");
    closeSidebarBtn.classList.add("lg:block", "md:block");

    // Hide open toggle
    openSidebarBtn.classList.remove("lg:block", "md:block");
    openSidebarBtn.classList.add("lg:hidden", "md:hidden");
  });
};

// Add sidebar for small screen
const addSidebarSmallScreen = () => {
  toggleSidebar.addEventListener("click", () => {
    sidebar.classList.remove("sm:-left-[50%]");
    sidebar.classList.add("sm:left-0");
  });
};

// Hide sidebar for small screen
const hideSidebarSmallScreen = () => {
  closeToggleSidebar.addEventListener("click", () => {
    sidebar.classList.remove("sm:left-0");
    sidebar.classList.add("sm:-left-[50%]");
  });
};

// Light mode
const activeLightmode = () => {
  sunBtn.addEventListener("click", () => {
    document.body.classList.remove("dark");
    localStorage.setItem("theme", "light");
    sunBtn.classList.add("hidden");
    moonBtn.classList.remove("hidden");
    moonBtn.classList.add("block");
  });
};

// Dark mode
const activeDarkmode = () => {
  moonBtn.addEventListener("click", () => {
    document.body.classList.add("dark");
    localStorage.setItem("theme", "dark");
    moonBtn.classList.add("hidden");
    sunBtn.classList.remove("hidden");
    sunBtn.classList.add("block");
  });
};

// Changes between light and dark
const currentMode = localStorage.getItem("theme");
if (currentMode === "dark") {
  doc.body.classList.add("dark");
  moonBtn.classList.add("hidden");
  sunBtn.classList.remove("hidden");
  sunBtn.classList.add("block");
} else {
  doc.body.classList.remove("dark");
  sunBtn.classList.add("hidden");
  moonBtn.classList.remove("hidden");
  moonBtn.classList.add("block");
}

// Active dropdown
const activeDropdown = () => {
  adminImage.addEventListener("click", () => {
    if (profileDropdown.classList.contains("hidden")) {
      profileDropdown.classList.remove("hidden");
      profileDropdown.classList.add("block");
    } else {
      profileDropdown.classList.remove("block");
      profileDropdown.classList.add("hidden");
    }
  });
};

// Main
const main = () => {
  // Sidebar functions
  activeSidebarTab();
  activeInnerTabs();
  appearInnerTabs();

  // Navbar functions
  removeSidebar();
  addSidebar();
  addSidebarSmallScreen();
  hideSidebarSmallScreen();
  activeLightmode();
  activeDarkmode();
  activeDropdown();
};

doc.addEventListener("DOMContentLoaded", main);

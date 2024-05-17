// declaring document
const doc = document;

// sidebar variables
const sidebar = doc.getElementsByClassName('aside-sidebar')[0];
const ul = doc.getElementsByClassName("sidebar-tabs")[0];
const dashboardTab = ul.getElementsByClassName('dashboard-tab')[0];
const categoryToggle = ul.getElementsByClassName('category-toggle')[0];
const productToggle = ul.getElementsByClassName('product-toggle')[0];
const userToggle = ul.getElementsByClassName('user-toggle')[0];
const categoryInner = ul.getElementsByClassName('inner-category')[0];
const userInner = ul.getElementsByClassName('inner-user')[0];

// adding active class to the clicked sidebar tab
const activeSidebarTab = () => {
    const sidebarTabs = Array.from(ul.getElementsByClassName("tabs"));
    let previousAdminTab = null;

    sidebarTabs.forEach(tab => {
        tab.addEventListener("click", function (event) {
            // event.preventDefault();
            let currentTab = event.currentTarget;

            if (!currentTab.classList.contains('active')) {
                // Remove 'active' class from all tabs
                sidebarTabs.forEach(t => t.classList.remove('active'));
                // Add 'active' class to the clicked tab
                currentTab.classList.add('active');

                // Handle the toggle button rotation for the currently clicked tab
                const currentAdminTab = currentTab.querySelector('.toggle-btn');
                if (previousAdminTab && previousAdminTab !== currentAdminTab) {
                    previousAdminTab.classList.remove('rotate-180');
                }
                if (currentAdminTab) {
                    currentAdminTab.classList.add('rotate-180');
                }
                previousAdminTab = currentAdminTab;

                // close innertabs
                if (categoryToggle.classList.contains('flex')) {
                    categoryInner.classList.remove('flex');
                    categoryInner.classList.add('hidden');
                }
                if (userToggle.classList.contains('flex')) {
                    userInner.classList.remove('flex');
                    userInner.classList.add('hidden');
                }

            } else {
                // for the tab not toggle
                if (currentTab === productToggle || currentTab === dashboardTab) {
                    // Keep productToggle and dashboardTab active, do nothing
                    currentTab.classList.add('active');
                } else {
                    currentTab.classList.remove('active');
                }
                // end of for only tabs 


                // Handle the toggle button rotation for the currently clicked tab
                const currentAdminTab = currentTab.querySelector('.toggle-btn');
                if (currentAdminTab) {
                    currentAdminTab.classList.remove('rotate-180');
                }

                // Reset previousAdminTab as no tab is active now
                previousAdminTab = null;
            }
        });
    });
    // end of adding active classes to the sidebar tabs
}

// active innertabs
const activeInnerTabs = () => {
    const innerTabs = Array.from(ul.getElementsByClassName('inner-tabs'));
    innerTabs.forEach(tab => {
        tab.addEventListener('click', (event) => {
            const currentInnerTab = event.currentTarget;

            // Remove 'active' class from all inner tabs
            innerTabs.forEach(t => t.classList.remove('active'));
            // Add 'active' class to the clicked inner tab
            currentInnerTab.classList.add('active');
        });
    });
}
// end of active innerTabs

// appear innertabs 
const appearInnerTabs = () => {
    const innerCategoryAction = () => {
        categoryToggle.addEventListener('click', () => {
            if (categoryToggle.classList.contains('active')) {
                categoryInner.classList.remove('hidden');
                categoryInner.classList.add('flex');
            } else {
                categoryInner.classList.remove('flex');
                categoryInner.classList.add('hidden');
            }
        })
    }
    const innerUserAction = () => {
        userToggle.addEventListener('click', () => {
            if (userToggle.classList.contains('active')) {
                userInner.classList.remove('hidden');
                userInner.classList.add('flex');
            } else {
                userInner.classList.remove('flex');
                userInner.classList.add('hidden');
            }
        })
    }

    innerCategoryAction();
    innerUserAction();
}
// end appear innertabs

/*
    ----- end of sidebar part -----
    ----- navbar start -----
*/

// navbar variables
const mainPart = doc.getElementsByClassName('main-part')[0];
const closeSidebarBtn = doc.getElementsByClassName('close-sidebar-toggle')[0];
const openSidebarBtn = doc.getElementsByClassName('open-sidebar-toggle')[0];
const toggleSidebar = doc.getElementsByClassName('toggle-sidebar')[0];
const closeToggleSidebar = doc.getElementsByClassName('x-toggle-sidebar')[0];
const sunBtn = doc.getElementsByClassName('sun-btn')[0];
const moonBtn = doc.getElementsByClassName('moon-btn')[0];
const adminImage = doc.getElementsByClassName('admin-image')[0];
const profileDropdown = doc.getElementsByClassName('profile-dropdown')[0];


// sidebar disappear
const removeSidebar = () => {
    closeSidebarBtn.addEventListener('click', () => {
        // remove sidebar
        sidebar.classList.remove('lg:block');
        sidebar.classList.remove('md:block');
        sidebar.classList.add('lg:hidden');
        sidebar.classList.add('md:hidden');

        // full navbar
        mainPart.classList.remove('lg:w-5/6');
        mainPart.classList.remove('md:w-5/6');
        mainPart.classList.add('lg:w-full');
        mainPart.classList.add('md:w-full');

        // hide close toggle
        closeSidebarBtn.classList.remove('lg:block');
        closeSidebarBtn.classList.remove('md:block');
        closeSidebarBtn.classList.add('lg:hidden');
        closeSidebarBtn.classList.add('md:hidden');

        // add open toggle
        openSidebarBtn.classList.remove('lg:hidden');
        openSidebarBtn.classList.remove('md:hidden');
        openSidebarBtn.classList.add('lg:block');
        openSidebarBtn.classList.add('md:block');
    })
}
// sidebar appear
const addSidebar = () => {
    openSidebarBtn.addEventListener('click', () => {
        // remove sidebar
        sidebar.classList.remove('lg:hidden');
        sidebar.classList.remove('md:hidden');
        sidebar.classList.add('lg:block');
        sidebar.classList.add('md:block');

        // fixed navbar
        mainPart.classList.remove('lg:full');
        mainPart.classList.remove('md:full');
        mainPart.classList.add('lg:w-5/6');
        mainPart.classList.add('md:w-5/6');

        // add close toggle
        closeSidebarBtn.classList.remove('lg:hidden');
        closeSidebarBtn.classList.remove('md:hidden');
        closeSidebarBtn.classList.add('lg:block');
        closeSidebarBtn.classList.add('md:block');

        // hide open toggle
        openSidebarBtn.classList.remove('lg:block');
        openSidebarBtn.classList.remove('md:block');
        openSidebarBtn.classList.add('lg:hidden');
        openSidebarBtn.classList.add('md:hidden');

    })
}
// add sidebar for small screen
const addSidebarSmallScreen = () => {
    toggleSidebar.addEventListener('click', () => {
        sidebar.classList.remove('sm:-left-[50%]');
        sidebar.classList.add('sm:left-0');
    })
}
// hide sidebar for small screen 
const hideSidebarSmallScreen = () => {
    closeToggleSidebar.addEventListener('click', () => {
        sidebar.classList.remove('sm:left-0');
        sidebar.classList.add('sm:-left-[50%]');
    })
}

// Light mode
const activeLightmode = () => {
    sunBtn.addEventListener('click', () => {
        document.body.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        sunBtn.classList.add('hidden');
        moonBtn.classList.remove('hidden');
        moonBtn.classList.add('block');
    });
};

// Dark mode
const activeDarkmode = () => {
    moonBtn.addEventListener('click', () => {
        document.body.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        moonBtn.classList.add('hidden');
        sunBtn.classList.remove('hidden');
        sunBtn.classList.add('block');
    });
};

// changes between light and dark
const currentMode = localStorage.getItem('theme');
if (currentMode === 'dark') {
    doc.body.classList.add('dark');
    moonBtn.classList.add('hidden');
    sunBtn.classList.remove('hidden');
    sunBtn.classList.add('block');
} else {
    doc.body.classList.remove('dark');
    sunBtn.classList.add('hidden');
    moonBtn.classList.remove('hidden');
    moonBtn.classList.add('block');
}

// active dropdown
const activeDropdown = () => {
    adminImage.addEventListener('click', () => {
        if (profileDropdown.classList.contains('hidden')) {
            profileDropdown.classList.remove('hidden');
            profileDropdown.classList.add('block');
        } else {
            profileDropdown.classList.remove('block');
            profileDropdown.classList.add('hidden');
        }
    })
}

// main
const main = () => {
    // sidebar functions
    activeSidebarTab();
    activeInnerTabs();
    appearInnerTabs();

    // navbar functions
    removeSidebar();
    addSidebar();
    addSidebarSmallScreen();
    hideSidebarSmallScreen();
    activeLightmode();
    activeDarkmode();
    activeDropdown();
}
main();

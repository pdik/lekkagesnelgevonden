/*
 *  Document   : report_choose_item
 *  Author     : Pepijn dik
 *  Description: Custom JS code used in Report choose items
 */

// Helper variables
let items,
    itemList, itemListSelected,
    itemBadge, itemBadgeSelected;

class item_choose {
    /*
     * Init items
     *
     */
    static inititems() {
        console.log('item chooser');
        let self = this;

        // Set variables
        items                  = jQuery('.js-item');

        itemList               = jQuery('.js-item-list');
        itemListSelected      = jQuery('.js-item-list-selected');

        itemBadge              = jQuery('.js-item-badge');
        itemBadgeSelected     = jQuery('.js-item-badge-selected');

        // Update badges
        this.badgesUpdate();
        // item status update on checkbox click
        let sitem, sitemId;

        items.on('click', '.js-item-status', e => {
            e.preventDefault();

            sitem   = jQuery(e.currentTarget).closest('.js-item');
            sitemId = sitem.data('item-id');

            // Check item status and toggle it
            console.log(sitemId)
            if (sitem.data('item-selected')) {
                self.itemUnselect(sitemId);
            } else {
                self.itemSelected(sitemId);
            }
        });
    }

    /*
     * Update Badges
     *
     */
    static badgesUpdate() {
        itemBadge.text(itemList.children().length || '');
        itemBadgeSelected.text(itemListSelected.children().length || '');
    }



    /*
     * Set a item to unselect
     *
     */
    static itemUnselect(itemId) {
        let item = jQuery('.js-item[data-item-id="' + itemId + '"]');

        // Check if exists and update accordignly
        if (item.length > 0) {
            item.data('item-selected', false);
            item.find('.table').toggleClass('bg-body');
            item.find('.js-item-status > input').prop('checked', false);
            item.find('.js-item-content > del').contents().unwrap();

            if (item.data('item-starred')) {
                // item.prependTo(itemListStarred);
            } else {
                item.prependTo(itemList);
            }

            // Update badges
            this.badgesUpdate();
        }
    }

    /*
     * Set a item to completed
     *
     */
    static itemSelected(itemId) {
        let item = jQuery('.js-item[data-item-id="' + itemId + '"]');

        // Check if exists and update accordignly
        if (item.length > 0) {
            item.data('item-selected', true);
            item.find('.table').toggleClass('bg-body');
            item.find('.js-item-status > input').prop('checked', true);
            item.find('.js-item-content').wrapInner('<p></p>');
            item.prependTo(itemListSelected);
            // Update badges
            this.badgesUpdate();

            // Update item status based on your database setup
            // ..
        }
    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.inititems();
    }
}

// Initialize when page loads
jQuery(() => { item_choose.init(); });

@hasaccess?('collections', 'create')
<div riot-view>
    
    <div class="uk-margin">
        
        <field-boolean bind="moreoptions" bind-event="input" label="@lang('More Options')"></field-boolean>
        
    </div>
    
    <form class="uk-form" onsubmit="{ submit }">
    
        <div class="uk-panel-box uk-panel-card" if="{ moreoptions }">
            
            <label class="uk-text-small">@lang('Collection types')</label>
            <field-tags bind="types"></field-tags>
            
        </div>
    
    </form>

    <script type="view/script">

        var $this = this;

        this.mixin(RiotBindMixin);

        
        this.moreoptions = false;
        this.types = ['image gallery', 'configuration', 'main'];
        
        this.on('mount', function(){
            
            
            
        });
        
        this.on('update', function(){
            
            
            
        });

        submit(e) {

            if (e) e.preventDefault();

            // App.request('/collections/save_collection', {collection: this.collection, rules: this.rules}).then(function(collection) {

                // App.ui.notify("Saving successful", "success");
                // $this.collection = collection;
                // $this.update();

            // }).catch(function() {
                // App.ui.notify("Saving failed.", "danger");
            // });
        }

    </script>

</div>
@endif
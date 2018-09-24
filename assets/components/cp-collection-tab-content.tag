<cp-collection-tab-content>

    <div class="uk-form-row" show={tab==opts.tab}>
    
        <div class="uk-form-icon uk-form uk-width-1-1 uk-text-muted">
        
            <div class="uk-margin uk-panel uk-panel-box uk-panel-card">
                <label class="uk-text-small">{ App.i18n.get('Collection Type (for Grouping)') }</label>
                <field-multipleselect options="{ types }" bind="collection.type"></field-multipleselect>
                
                <label class="uk-text-small">{ App.i18n.get('Add custom types') }</label>
                <field-tags bind="collection.type"></field-tags>
            </div>
            
            <div class="uk-margin uk-panel uk-panel-box uk-panel-card">
                <label class="uk-text-small">{ App.i18n.get('Color') }</label>
                <field-color bind="collection.color"></field-color>
            </div>
            
            <div class="uk-margin uk-panel uk-panel-box uk-panel-card">
                <label class="uk-text-small">{ App.i18n.get('All options') }</label>
                <field-object bind="collection" label="@lang('Options')" height="500px"></field-object>
            </div>
            
        </div>
        
    </div>

    <script>
    
        var $this = this;

        this.types = opts.types ? opts.types : "image gallery, configuration, main";
        
    </script>

</cp-collection-tab-content>
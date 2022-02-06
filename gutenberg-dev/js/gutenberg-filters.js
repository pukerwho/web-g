console.log('codeBlock');
const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls } = wp.blockEditor;
const { ToggleControl, PanelBody, PanelRow, CheckboxControl, SelectControl, ColorPicker } = wp.components;
 
 
registerBlockType('treba/code-block', {
  title: 'Treba Code',
  category: 'common',
  attributes: {
    trebaCode: {
      type: 'string',
      source: 'html',
      selector: 'code',
    },
    trebaCodeLang: {
      type: 'string',
      default: 'language-css'
    },
  },
  edit: (props) => { 
    const { attributes, setAttributes } = props;
    return (
      <div>
        <InspectorControls>
          <PanelBody
            title="Настройки блока"
            initialOpen={true}
          >
            <PanelRow>
              <SelectControl
                label="Язык программирования"
                value={attributes.trebaCodeLang}
                options={[
                  {label: "html", value: 'language-html'},
                  {label: "css", value: 'language-css'},
                  {label: "javascript", value: 'language-javascript'},
                ]}
                onChange={(newval) => setAttributes({ trebaCodeLang: newval })}
              />
            </PanelRow>
          </PanelBody>
        </InspectorControls>

        <RichText
          tagName="pre"
          placeholder="Ваш код..."
          value={attributes.trebaCode}
          onChange={(newtext) => setAttributes({ trebaCode: newtext })}
        />
      </div>
    );
  },
  save: (props) => { 
    const { attributes } = props;
    return (
      <div>
        <pre className={attributes.trebaCodeLang}>
          <code>
            {attributes.trebaCode}
          </code>
        </pre>
      </div>
    );
  }

});
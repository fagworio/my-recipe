// blockquote
import './blockquote.scss';
import blockIcons from '../icons/index';

const { registerBlockType }         =   wp.blocks;
const { RichText }                  =   wp.editor;
const { __ }                        =   wp.i18n;

registerBlockType( 'myrps/blockquote', {
    title:                              __( 'MyRecipe Blockquote', 'myrps' ),
    description:                        __( 'Just a stylized Blockquote, as simple as to Quote.', 'myrps' ),
    category:                           'common',
    icon:                               blockIcons.myQuoute,
    attributes: {
        title:  {
            type: 'array',
            source: 'children',
            selector: '.title-ctr'
        },
        quotedBy: {
            type: 'array',
            source: 'children',
            selector: '.message-ctr'
        }
    },
    edit: ( props ) => {
        return (
            <div className={ props.className }>
                <RichText
                    tagName="blockquote"
                    multline="p"
                    cite={props.attributes.quotedBy}
                    placeholder={ __( 'MyRecipe cool Blockquote Example. Do you have courage, do it. Edit Me!', 'myrps' ) } 
                    onChange={ ( newVal )=>{
                        props.setAttributes( { title: newVal } );
                    } }
                    value={ props.attributes.title }
                />
                <RichText
                    tagName="cite"
                    multline="p"
                    placeholder={ __( 'Give me a name if you want to', 'myrps' ) } 
                    onChange={ ( newVal )=>{
                        props.setAttributes( { quotedBy: newVal } );
                    } }
                    value={ props.attributes.quotedBy }
                />
               
            </div>
        );
    },
    save: ( props ) => {
        return(
            <blockquote className={ props.className, 'wp-block-myrps-blockquote' }>
                <p> { props.attributes.title } </p>
                <cite> {props.attributes.quotedBy} </cite>
            </blockquote>
        )
    }
});
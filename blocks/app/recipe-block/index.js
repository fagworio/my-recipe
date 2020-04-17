//Recipe Block

import blockIcons from '../icons/index';

import './editor.scss';

const { registerBlockType } 		= 		wp.blocks;
const { __ } = wp.i18n;
const { InspectorControls }	 		= 		wp.editor;
const { PanelBody, PanelRow,
	TextControl, SelectControl } 	= 		wp.components;

registerBlockType('myrps/recipe', {
	title: __('MyRecipe', 'myrps'),
	description: __('Provides a short summary of a recipe', 'myrps'),
	// common, formatting, layout, widgets, embeds
	category: 'common',
	icon: blockIcons.myrecipe,
	keywords: [
		__('Food', 'myrps'),
		__('Recipe', 'myrps'),
		__('Ingredients', 'myrps'),
		__('Meal Type', 'myrps'),
	],
	supports: {
		html: false
	},
	attributes: {
		ingredients: {
			type: 'string',
			source: 'text',
			selector: '.ingedients-ph'
		},
		cookingTime: {
			type: 'string',
			source: 'text',
			selector: '.cooking-time-ph'
		},
		utensils: {
			type: 'string',
			source: 'text',
			selector: '.utensils-ph'
		},
		cookingExperience: {
			type: 'string',
			source: 'text',
			default: 'Beginner',
			selector: '.cooking-experience-ph'
		},
		mealType: {
			type: 'string',
			source: 'text',
			default: 'Breakfast',
			selector: '.meal-type-ph'
		}
	},
	edit: (props) => {
		const updateIngredients = (newVal) => {
			props.setAttributes({ ingredients: newVal });
		}

		const updateCookingTime = (newVal) => {
			props.setAttributes({ cookingTime: newVal });
		}

		const updateUtensils = (newVal) => {
			props.setAttributes({ utensils: newVal });
		}

		const updateCookingExperience = (newVal) => {
			props.setAttributes({ cookingExperience: newVal });
		}

		const updateMealType = (newVal) => {
			props.setAttributes({ mealType: newVal });
		}

		return [
			<InspectorControls>
				<PanelBody title={__('Basics', 'myrps')}>
					<PanelRow>
						<p>{__('Configure the content of your body here.', 'myrps')}</p>
					</PanelRow>
					<TextControl
						label={__('Ingredients', 'myrps')}
						help={__('Ex: tomatoes, lettuce, olive oil, etc.', 'myrps')}
						value={props.attributes.ingredients}
						onChange={updateIngredients}
					/>

					<TextControl
						label={__('Cooking Time', 'myrps')}
						help={__('How long will this take to cook?', 'myrps')}
						value={props.attributes.cookingTime}
						onChange={updateCookingTime}
					/>

					<TextControl
						label={__('Utensils', 'myrps')}
						help={__('Ex: spon, knife, pots, pans.', 'myrps')}
						value={props.attributes.utensils}
						onChange={updateUtensils}
					/>
					<SelectControl
						label={__('Cooking experience', 'myrps')}
						help={__('How skilled should the reader be?')}
						value={props.attributes.cookingExperience}
						options={[
							{ value: 'Beginner', label: __('Beginner', 'myrps') },
							{ value: 'Intermediate', label: __('Intermediate', 'myrps') },
							{ value: 'Expert', label: __('Expert', 'myrps') }
						]}
						onChange={updateCookingExperience} />

					<SelectControl
						label={__('Meal Type', 'myrps')}
						help={__('When is this best to eaten?')}
						value={props.attributes.mealType}
						options={[
							{ value: __('Breackfast', 'myrps'), label: __('Breackfast', 'myrps') },
							{ value: __('Lunch', 'myrps'), label: __('Lunch', 'myrps') },
							{ value: __('Dinner', 'myrps'), label: __('Dinner', 'myrps') },
							{ value: __('Any time', 'myrps'), label: __('Any time', 'myrps') }
						]}
						onChange={updateMealType} />

				</PanelBody>
			</InspectorControls>,
			<div className={props.className}>
				<ul className="list-unstyled">
					<li>
						<strong>{__('Ingredients:', 'myrps')} </strong>
						<span className="ingedients-ph">{props.attributes.ingredients}</span>
					</li>
					<li>
						<strong>{__('Cooking Time:', 'myrps')} </strong>
						<span className="cooking-experience-ph">{props.attributes.cookingTime}</span>
					</li>
					<li>
						<strong>{__('Utensils:', 'myrps')} </strong>
						<span className="utensils-ph">{props.attributes.utensils}</span>
					</li>
					<li>
						<strong>{__('Cooking Experience:', 'myrps')} </strong>
						<span className="cooking-experience-ph">{props.attributes.cookingExperience}</span>
					</li>
					<li>
						<strong>{__('Meal Type:', 'myrps')} </strong>
						<span className="meal-type-ph">{props.attributes.mealType}</span>
					</li>
				</ul>
			</div>
		]
	},
	save: (props) => {
		return (
			<div>
				<ul className="list-unstyled">
					<li>
						<strong>{__('Ingredients:', 'myrps')} </strong>
						<span className="ingedients-ph">{props.attributes.ingredients}</span>
					</li>
					<li>
						<strong>{__('Cooking Time:', 'myrps')} </strong>
						<span className="cooking-experience-ph">{props.attributes.cookingTime}</span>
					</li>
					<li>
						<strong>{__('Utensils:', 'myrps')} </strong>
						<span className="utensils-ph">{props.attributes.utensils}</span>
					</li>
					<li>
						<strong>{__('Cooking Experience:', 'myrps')} </strong>
						<span className="cooking-experience-ph">{props.attributes.cookingExperience}</span>
					</li>
					<li>
						<strong>{__('Meal Type:', 'myrps')} </strong>
						<span className="meal-type-ph">{props.attributes.mealType}</span>
					</li>
				</ul>
			</div>)
	}
});
import classnames from 'classnames';
import { template, faqBorderTypes } from './config';
import {
	InnerBlocks,
	InspectorControls,
	withColors,
	__experimentalBlock as Block,
} from '@wordpress/block-editor';
import {
	PanelBody,
	BaseControl,
	RangeControl,
	Button,
	ColorPalette,
} from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { Fragment } from '@wordpress/element';
import { select } from '@wordpress/data';
import { __ } from '@wordpress/i18n';

function faq( props ) {
	const {
		className,
		attributes,
		setAttributes,
		backgroundColor,
		setBackgroundColor,
		borderColor,
		setBorderColor,
	} = props;

	const {
		borderType,
		borderSize,
	} = attributes;

	const { colors } = select( 'core/block-editor' ).getSettings();

	const faqClasses = classnames(
		'ystdtb-faq',
		className,
		{
			'has-padding': 'all' === borderType || backgroundColor.color,
			[ `border-type--${ borderType }` ]: '' !== borderType,
		}
	);

	const faqStyles = {
		backgroundColor: backgroundColor.color,
		borderColor: borderColor.color,
		borderWidth: 'all' === borderType ? borderSize : undefined,
		borderBottomWidth: 'bottom' === borderType ? borderSize : undefined,

	};

	return (
		<Fragment>
			<InspectorControls>
				<PanelBody
					title={ __( 'FAQ', 'ystandard-toolbox' ) }
				>
					<BaseControl
						id={ 'background-color' }
						label={ __( '背景色', 'ystandard-toolbox' ) }
					>
						<ColorPalette
							colors={ colors }
							disableCustomColors={ false }
							onChange={ ( color ) => {
								setBackgroundColor( color );
							} }
							value={ backgroundColor.color }
						/>
					</BaseControl>
					<BaseControl
						id={ 'border-type' }
						label={ __( '枠線タイプ', 'ystandard-toolbox' ) }
					>
						<div className="ystdtb__horizon-buttons">
							{ faqBorderTypes.map( ( item ) => {
								return (
									<Button
										key={ item.name }
										isSecondary={
											borderType !==
											item.name
										}
										isPrimary={
											borderType ===
											item.name
										}
										onClick={ () => {
											setAttributes( {
												borderType: item.name,
											} );
											if ( '' === item.name ) {
												setAttributes( { borderSize: 0 } );
												setBorderColor( undefined );
											}
										} }
									>
										<span>{ item.label }</span>
									</Button>
								);
							} ) }
						</div>
					</BaseControl>
					{ ( '' !== borderType &&
						<>
							<BaseControl
								id={ 'border-size' }
								label={ __( '枠線サイズ', 'ystandard-toolbox' ) }
							>
								<RangeControl
									value={ undefined === borderSize ? 0 : borderSize }
									onChange={ ( value ) =>
										setAttributes( { borderSize: value } )
									}
									min={ 0 }
									max={ 10 }
									step={ 1 }
									allowReset={ true }
								/>
							</BaseControl>
							<BaseControl
								id={ 'border-color' }
								label={ __( '枠線の色', 'ystandard-toolbox' ) }
							>
								<ColorPalette
									colors={ colors }
									disableCustomColors={ false }
									onChange={ ( color ) => {
										setBorderColor( color );
									} }
									value={ borderColor.color }
								/>
							</BaseControl>
						</>
					) }
				</PanelBody>
			</InspectorControls>

			<Block.div className={ classnames( 'ystdtb-faq-wrap' ) }>
				<div className={ faqClasses } style={ faqStyles }>
					<InnerBlocks
						allowedBlocks={ [ 'ystdtb/faq-item' ] }
						template={ template }
						templateLock={ 'all' }
					/>
				</div>
			</Block.div>
		</Fragment>
	);
}

export default compose( [
	withColors( {
		backgroundColor: 'backgroundColor',
		borderColor: 'borderColor',
	} ),
] )( faq );

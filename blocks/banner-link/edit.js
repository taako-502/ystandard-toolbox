import classnames from 'classnames';
import {
	withColors,
	withFontSizes,
	useBlockProps,
} from '@wordpress/block-editor';
import { compose } from '@wordpress/compose';
import { blockClassName } from "./config";
import { BannerLinkInspectorControls as InspectorControls } from './inspector-controls';
import { getBoxShadowStyle } from "@ystdtb/components/box-shadow-control";

const BannerLink = ( props ) => {

	const {
		attributes,
	} = props;

	const {
		boxShadow,
	} = attributes;

	const blockWrapProps = useBlockProps( {} );

	const blockProps = {
		className: classnames( blockClassName, {} ),
		style: {
			...getBoxShadowStyle( boxShadow )
		}
	}

	return (
		<>
			<InspectorControls { ...props } />

			<div { ...blockWrapProps }>
				<div { ...blockProps }>
					<p>開発中。。。</p>
				</div>
			</div>
		</>
	);
};

export default compose( [] )( BannerLink );

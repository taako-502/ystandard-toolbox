import { InspectorControls } from '@wordpress/block-editor';
import PanelPadding from "./padding/index";
import PanelMainText from "./main-text";
import PanelBoxShadow from "./box-shadow";
import PanelLink from "./link";
import PanelBanner from "./banner";

export const BannerLinkInspectorControls = ( props ) => {

	return (
		<InspectorControls>
			<PanelLink { ...props } />
			<PanelBanner { ...props } />
			<PanelMainText { ...props } />
			<PanelPadding { ...props } />
			<PanelBoxShadow { ...props } />
		</InspectorControls>
	);
}

<?php
class FeaturesView extends Features
{
    public function getAllFeaturesView()
    {
        return $this->getAllFeatures();
    }

    public function getFeaturesByIdPerView($id)
    {
        return $this->getFeaturesByIdPer($id);
    }
}

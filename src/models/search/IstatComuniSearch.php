<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\comuni
 * @author    Aria S.p.A. <protocollo@pec.ariaspa.it>
 * @license   GNU General Public License v3.0 <https://www.gnu.org/licenses/gpl-3.0.html>
 * @link      https://www.ariaspa.it/
 *
 * This file is part of OPEN 2.0.
 *
 * OPEN 2.0 is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OPEN 2.0 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OPEN 2.0. If not, see <https://www.gnu.org/licenses/>.
 */

namespace open20\amos\comuni\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use open20\amos\comuni\models\IstatComuni;

/**
 * IstatComuniSearch represents the model behind the search form about `open20\amos\comuni\models\IstatComuni`.
 */
class IstatComuniSearch extends IstatComuni
{
    public function rules()
    {
        return [
            [['id', 'cod_ripartizione_geografica', 'comune_capoluogo_provincia', 'codice_2006_2009', 'codice_1995_2005', 'popolazione_20111009', 'soppresso', 'istat_unione_dei_comuni_id', 'istat_regioni_id', 'istat_province_id'], 'integer'],
            [['nome', 'progressivo', 'nome_tedesco', 'ripartizione_geografica', 'cod_istat_alfanumerico', 'codice_catastale', 'codice_nuts1_2010', 'codice_nuts2_2010', 'codice_nuts3_2010', 'codice_nuts1_2006', 'codice_nuts2_2006', 'codice_nuts3_2006'], 'safe'],
        ];
    }

    public function scenarios()
    {
// bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = IstatComuni::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cod_ripartizione_geografica' => $this->cod_ripartizione_geografica,
            'comune_capoluogo_provincia' => $this->comune_capoluogo_provincia,
            'codice_2006_2009' => $this->codice_2006_2009,
            'codice_1995_2005' => $this->codice_1995_2005,
            'popolazione_20111009' => $this->popolazione_20111009,
            'soppresso' => $this->soppresso,
            'istat_unione_dei_comuni_id' => $this->istat_unione_dei_comuni_id,
            'istat_regioni_id' => $this->istat_regioni_id,
            'istat_province_id' => $this->istat_province_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'progressivo', $this->progressivo])
            ->andFilterWhere(['like', 'nome_tedesco', $this->nome_tedesco])
            ->andFilterWhere(['like', 'ripartizione_geografica', $this->ripartizione_geografica])
            ->andFilterWhere(['like', 'cod_istat_alfanumerico', $this->cod_istat_alfanumerico])
            ->andFilterWhere(['like', 'codice_catastale', $this->codice_catastale])
            ->andFilterWhere(['like', 'codice_nuts1_2010', $this->codice_nuts1_2010])
            ->andFilterWhere(['like', 'codice_nuts2_2010', $this->codice_nuts2_2010])
            ->andFilterWhere(['like', 'codice_nuts3_2010', $this->codice_nuts3_2010])
            ->andFilterWhere(['like', 'codice_nuts1_2006', $this->codice_nuts1_2006])
            ->andFilterWhere(['like', 'codice_nuts2_2006', $this->codice_nuts2_2006])
            ->andFilterWhere(['like', 'codice_nuts3_2006', $this->codice_nuts3_2006]);

        return $dataProvider;
    }
}

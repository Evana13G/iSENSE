// Generated by CoffeeScript 1.3.3

/*
 * Copyright (c) 2011, iSENSE Project. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this
 * list of conditions and the following disclaimer. Redistributions in binary
 * form must reproduce the above copyright notice, this list of conditions and
 * the following disclaimer in the documentation and/or other materials
 * provided with the distribution. Neither the name of the University of
 * Massachusetts Lowell nor the names of its contributors may be used to
 * endorse or promote products derived from this software without specific
 * prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
 * DAMAGE.
 *
*/


(function() {
  var __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  window.Motion = (function(_super) {

    __extends(Motion, _super);

    function Motion(canvas) {
      this.canvas = canvas;
    }

    Motion.prototype.start = function() {
      var chart, dat, dataPoint, dt, field, fieldIndex, line, row, rows, _i, _j, _len, _len1, _ref;
      ($('#' + this.canvas)).show();
      dt = new google.visualization.DataTable();
      _ref = data.fields;
      for (fieldIndex = _i = 0, _len = _ref.length; _i < _len; fieldIndex = ++_i) {
        field = _ref[fieldIndex];
        switch (Number(field.typeID)) {
          case data.types.TEXT:
            dt.addColumn('string', field.fieldName);
            break;
          case data.types.TIME:
            dt.addColumn('date', field.fieldName);
            break;
          default:
            dt.addColumn('number', field.fieldName);
        }
      }
      rows = (function() {
        var _j, _len1, _ref1, _results;
        _ref1 = data.dataPoints;
        _results = [];
        for (_j = 0, _len1 = _ref1.length; _j < _len1; _j++) {
          dataPoint = _ref1[_j];
          line = (function() {
            var _k, _len2, _results1;
            _results1 = [];
            for (fieldIndex = _k = 0, _len2 = dataPoint.length; _k < _len2; fieldIndex = ++_k) {
              dat = dataPoint[fieldIndex];
              if ((Number(data.fields[fieldIndex].typeID)) === data.types.TIME) {
                _results1.push(new Date(dat));
              } else {
                _results1.push(dat);
              }
            }
            return _results1;
          })();
          _results.push(line);
        }
        return _results;
      })();
      for (_j = 0, _len1 = rows.length; _j < _len1; _j++) {
        row = rows[_j];
        dt.addRow(row);
      }
      chart = new google.visualization.MotionChart(document.getElementById('motion_canvas'));
      chart.draw(dt, {
        width: 850,
        height: 490
      });
      return Motion.__super__.start.call(this);
    };

    Motion.prototype.update = function() {
      return Motion.__super__.update.call(this);
    };

    Motion.prototype.end = function() {
      return ($('#' + this.canvas)).hide();
    };

    Motion.prototype.drawControls = function() {
      return Motion.__super__.drawControls.call(this);
    };

    Motion.prototype.drawChart = function() {};

    return Motion;

  })(BaseVis);

  globals.motion = new Motion("motion_canvas");

}).call(this);
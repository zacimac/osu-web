// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import * as React from 'react';
import { classWithModifiers } from 'utils/css';

interface Props {
  count: number;
  iconClassName: string;
  ready: boolean;
  type?: string;
}

export default class NotificationIcon extends React.Component<Props> {
  static defaultProps = { iconClassName: 'fas fa-inbox' };

  render() {
    const modifiers = {
      glow: this.props.count > 0,
      mobile: this.props.type === 'mobile',
    };

    return (
      <span className={classWithModifiers('notification-icon', modifiers)}>
        <i className={this.props.iconClassName} />
        <span className='notification-icon__count'>
          {this.unreadCountDisplay}
        </span>
      </span>
    );
  }

  private get unreadCountDisplay() {
    if (this.props.ready) {
      // combination of latency and delays processing marking as read can cause the display count to go negative.
      const count = this.props.count > 0 ? this.props.count : 0;
      return osu.formatNumber(count);
    } else {
      return '...';
    }
  }
}
